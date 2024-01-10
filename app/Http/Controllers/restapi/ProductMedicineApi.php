<?php

namespace App\Http\Controllers\restapi;

use App\Enums\online_medicine\OnlineMedicineStatus;
use App\Enums\TypeProductCart;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\online_medicine\ProductMedicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductMedicineApi extends Controller
{
    public function findMedicineByCategory($id)
    {
        $productMedicines = DB::table('product_medicines')
            ->join('users', 'users.id', '=', 'product_medicines.user_id')
            ->where('product_medicines.category_id', $id)
            ->where('product_medicines.status', OnlineMedicineStatus::APPROVED)
            ->select('product_medicines.*', 'users.address_code')
            ->get();
        return response()->json($productMedicines);
    }

    public function getAllProductByExcelFile(Request $request)
    {
        try {
            if ($request->hasFile('prescriptions')) {
                $item = $request->file('prescriptions');
                $itemPath = $item->store('file_excel', 'public');
                $file_excel = asset('storage/' . $itemPath);
            } else {
                return response((new MainApi())->returnMessage('File prescriptions not empty!'), 400);
            }
            $products = [];
            if ($file_excel) {
                $products = (new BookingResultApi())->getListProductFromExcel($file_excel);
            }
            return response()->json($products);
        } catch (\Exception $exception) {
            return response((new MainApi())->returnMessage('Error, Please try again!'), 400);
        }
    }

    public function getAllProductByExcelFileBlade(Request $request)
    {
        try {
            if ($request->hasFile('prescriptions')) {
                $item = $request->file('prescriptions');
                $itemPath = $item->store('file_excel', 'public');
                $file_excel = asset('storage/' . $itemPath);
            } else {
                return response((new MainApi())->returnMessage('File prescriptions not empty!'), 400);
            }
            $products = [];
            if ($file_excel) {
                $products = (new BookingResultApi())->getListProductFromExcel($file_excel);
            }
            if (count($products) > 0) {
                $userID = Auth::user()->id;
                $typeProduct = TypeProductCart::MEDICINE;

                foreach ($products as $product) {
                    $cart = Cart::where('user_id', $userID)
                        ->where('product_id', $product->id)
                        ->where('type_product', $typeProduct)
                        ->first();
                    if ($cart) {
                        $cart->quantity = $cart->quantity + 1;
                    } else {
                        $cart = new Cart();
                        $cart->product_id = $product->id;
                        $cart->quantity = 1;
                        $cart->user_id = $userID;
                        $cart->type_product = $typeProduct;
                    }
                    $cart->save();
                }
                return response((new MainApi())->returnMessage('Update success!'), 200);
            }
            return response((new MainApi())->returnMessage('No valid product found!'), 201);
        } catch (\Exception $exception) {
            return response((new MainApi())->returnMessage('Error, Please try again!'), 400);
        }
    }

    public function detail($id)
    {
        $product = ProductMedicine::find($id);
        if (!$product || $product->status != OnlineMedicineStatus::APPROVED) {
            return response((new MainApi())->returnMessage('Not found'), 404);
        }
        return response()->json($product);
    }
}
