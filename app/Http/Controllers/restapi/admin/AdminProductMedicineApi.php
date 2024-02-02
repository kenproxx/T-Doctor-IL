<?php

namespace App\Http\Controllers\restapi\admin;

use App\Enums\online_medicine\OnlineMedicineStatus;
use App\Http\Controllers\Controller;
use App\Models\online_medicine\ProductMedicine;
use Illuminate\Http\Request;

class AdminProductMedicineApi extends Controller
{
    public function changeStatus(Request $request)
    {
        try {
            $id = $request->input('product_id');
            $productMedicine = ProductMedicine::find($id);

            if ($productMedicine->status == OnlineMedicineStatus::PENDING) {
                $productMedicine->status = OnlineMedicineStatus::APPROVED;
            } else {
                $productMedicine->status = OnlineMedicineStatus::PENDING;
            }
            $productMedicine->save();
            return response()->json($productMedicine);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }
}
