<?php

namespace App\Http\Controllers\restapi;

use App\Enums\online_medicine\OnlineMedicineStatus;
use App\Enums\PrescriptionResultStatus;
use App\Enums\TypeProductCart;
use App\Enums\UserStatus;
use App\ExportExcel\MedicineExport;
use App\Http\Controllers\Controller;
use App\Imports\ExcelImportClass;
use App\Models\Cart;
use App\Models\online_medicine\ProductMedicine;
use App\Models\PrescriptionResults;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use function Symfony\Component\String\u;

class PrescriptionResultApi extends Controller
{
    public function listPrescription(Request $request)
    {
        $prescriptions = PrescriptionResults::where('status', PrescriptionResultStatus::ACTIVE)
            ->orderByDesc('id')
            ->get();
        return response()->json($prescriptions);
    }

    public function listPrescriptionByUser(Request $request)
    {
        $user_id = $request->input('user_id');

        $prescriptions = DB::table('prescription_results')
            ->where('user_id', $user_id)
            ->where('status', PrescriptionResultStatus::ACTIVE)
            ->orderByDesc('id')
            ->cursor()
            ->map(function ($item) {
                $created = User::find($item->created_by);
                $prescription = (array)$item;
                $prescription['created'] = $created->toArray();
                return $prescription;
            });
        return response()->json($prescriptions);
    }

    public function listPrescriptionByDoctor(Request $request)
    {
        $doctor_id = $request->input('doctor_id');
        $prescriptions = DB::table('prescription_results')
            ->where('created_by', $doctor_id)
            ->where('status', PrescriptionResultStatus::ACTIVE)
            ->orderByDesc('id')
            ->cursor()
            ->map(function ($item) {
                $user = User::find($item->user_id);
                $prescription = (array)$item;
                $prescription['user'] = $user->toArray();
                return $prescription;
            });
        return response()->json($prescriptions);
    }

    public function createPrescription(Request $request)
    {
        try {
            $full_name = $request->input('full_name');
            $email = $request->input('email');

            $user = User::where('email', $email)
                ->where('status', '!=', UserStatus::DELETED)
                ->first();

            if (!$user) {
                return response((new MainApi())->returnMessage('User not found!'), 400);
            }

            $user_id = $user->id;

            $created_by = $request->input('created_by');

            $prescriptions = $request->input('prescriptions');

            $notes = $request->input('notes');
            $notes_en = $request->input('notes_en') ?? $notes;
            $notes_laos = $request->input('notes_laos') ?? $notes;

            $status = $request->input('status') ?? PrescriptionResultStatus::ACTIVE;

            $prescription_result = new PrescriptionResults();

            $prescription_result->full_name = $full_name;
            $prescription_result->email = $email;
            $prescription_result->user_id = $user_id;

            $prescription_result->created_by = $created_by;

            $prescription_result->prescriptions = $prescriptions;

            $prescription_result->notes = $notes;
            $prescription_result->notes_en = $notes_en;
            $prescription_result->notes_laos = $notes_laos;

            $prescription_result->status = $status;

            $success = $prescription_result->save();

            if ($success) {
                return response()->json($prescription_result);
            }
            return response((new MainApi())->returnMessage('Error, Create error!'), 400);
        } catch (\Exception $exception) {
            return response((new MainApi())->returnMessage('Error, Please try again!'), 400);
        }
    }

    public function exportAndDownload(Request $request)
    {
        try {
            $prescription_id = $request->input('prescription_id');
            $prescription = PrescriptionResults::find($prescription_id);
            if (!$prescription || $prescription->status == PrescriptionResultStatus::DELETED) {
                return response((new MainApi())->returnMessage('Not found!'), 400);
            }

            $medicines = '[' . $prescription->prescriptions . ']';
            $medicines = json_decode($medicines, true);
            return Excel::download(new MedicineExport($medicines), 'prescription.xlsx');
        } catch (\Exception $exception) {
            return response((new MainApi())->returnMessage('Error, Please try again!'), 400);
        }
    }

    public function addProductToCart(Request $request)
    {
        try {
            $userID = $request->input('user_id');

            $user = User::find($userID);
            if (!$user) {
                return response((new MainApi())->returnMessage('User not found!'), 404);
            }

            $prescription_id = $request->input('prescription_id');
            $prescription = PrescriptionResults::find($prescription_id);
            if (!$prescription || $prescription->status == PrescriptionResultStatus::DELETED) {
                return response((new MainApi())->returnMessage('Not found!'), 400);
            }

            $medicines = '[' . $prescription->prescriptions . ']';
            $medicines = json_decode($medicines, true);

            $fileName = 'prescription_' . time() . '.xlsx';
            $folderPath = 'exports';

            Excel::store(new MedicineExport($medicines), $folderPath . '/' . $fileName, 'public');


            $new_file = 'storage/' . $folderPath . '/' . $fileName;
            $file_excel = public_path($new_file);

            if ($file_excel) {
                $reader = Excel::toCollection(new ExcelImportClass, $file_excel)->first();

                $count = 0;
                foreach ($reader->skip(1) as $row) {
                    $nameMedicine = $row[0];

                    $ingredientMedicine = explode(',', $row[1]);

                    $quantity = $row[2];

                    $product = ProductMedicine::where(function ($query) use ($nameMedicine) {
                        $query->orWhere('name', 'LIKE', '%' . $this->normalizeString($nameMedicine) . '%');
                    })
                        ->where(function ($query) use ($ingredientMedicine) {
                            $query->orWhere(function ($subQuery) use ($ingredientMedicine) {
                                foreach ($ingredientMedicine as $item) {
                                    $subQuery->whereHas('DrugIngredient', function ($q) use ($item) {
                                        $q->where('component_name', 'LIKE', '%' . $this->normalizeString($item) . '%');
                                    });
                                }
                            });
                        })
                        ->where('status', OnlineMedicineStatus::APPROVED)
                        ->first();

                    $typeProduct = TypeProductCart::MEDICINE;
                    if ($product) {
                        $cart = Cart::where('user_id', $userID)
                            ->where('product_id', $product->id)
                            ->where('type_product', $typeProduct)
                            ->first();
                        if ($cart) {
                            $cart->quantity = $cart->quantity + (int)$quantity;
                        } else {
                            $cart = new Cart();
                            $cart->product_id = $product->id;
                            $cart->quantity = (int)$quantity;
                            $cart->user_id = $userID;
                            $cart->type_product = $typeProduct;
                        }
                        $cart->save();
                        $count = $count + 1;
                    }
                }
                if ($count > 0){
                    return response((new MainApi())->returnMessage('Add to cart success!'), 200);
                }
                return response((new MainApi())->returnMessage('No product!'), 201);
            }
            return response((new MainApi())->returnMessage('Excel file not found!'), 400);
        } catch (\Exception $exception) {
            return response((new MainApi())->returnMessage('Error, Please try again!'), 400);
        }
    }

    private function normalizeString($str)
    {
        return strtolower(trim($str));
    }
}
