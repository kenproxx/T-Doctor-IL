<?php

namespace App\Http\Controllers\restapi\admin;

use App\Enums\online_medicine\OnlineMedicineStatus;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\online_medicine\ProductMedicine;
use App\Models\Symptom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProductMedicineApi extends Controller
{
    function filterProduct(Request $request)
    {
        $stock = $request->input('stock');
        $status = $request->input('status');

        $products = DB::table('product_medicines')
            ->where('status', '!=', OnlineMedicineStatus::DELETED)
            ->when($stock, function ($query) use ($stock) {
                if ($stock == 'out') {
                    $query->where('quantity', 0);
                } elseif ($stock == 'in') {
                    $query->where('quantity', '>', 0);
                }
            })
            ->when($status, function ($query) use ($status) {
                $query->where('status', '=', $status);
            })
            ->orderByDesc('id')
            ->get();
        return response()->json($products);
    }

    public function changeStatus(Request $request)
    {
        try {
            $id = $request->input('product_id');
            $user_id = $request->input('user_id');
            $productMedicine = ProductMedicine::find($id);

            if ($productMedicine->status == OnlineMedicineStatus::PENDING) {
                $productMedicine->status = OnlineMedicineStatus::APPROVED;
            } else {
                $productMedicine->status = OnlineMedicineStatus::PENDING;
            }

            $productMedicine->proved_by = $user_id;
            $productMedicine->save();
            return response()->json($productMedicine);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }
}
