<?php

namespace App\Http\Controllers\restapi;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductMedicineApi extends Controller
{
    public function findMedicineByCategory($id)
    {
        $productMedicines = DB::table('product_medicines')
            ->join('users', 'users.id', '=', 'product_medicines.user_id')
            ->where('product_medicines.category_id', $id)
            ->select('product_medicines.*', 'users.address_code')
            ->get();
        return response()->json($productMedicines);
    }
}
