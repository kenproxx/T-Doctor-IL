<?php

namespace App\Http\Controllers\restapi;

use App\Enums\online_medicine\OnlineMedicineStatus;
use App\Http\Controllers\Controller;
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
}
