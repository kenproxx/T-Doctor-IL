<?php

namespace App\Http\Controllers\restapi;

use App\Enums\online_medicine\OnlineMedicineStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        $file_excel = null;
        if ($request->hasFile('prescriptions')) {
            $item = $request->file('prescriptions');
            $itemPath = $item->store('file_excel', 'public');
            $file_excel = asset('storage/' . $itemPath);
        }
        $products = [];
        if ($file_excel) {
            $products = (new BookingResultApi())->getListProductFromExcel($file_excel);
        }
        return response()->json($products);
    }
}
