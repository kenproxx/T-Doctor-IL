<?php

namespace App\Http\Controllers\admin;

use App\Enums\online_medicine\OnlineMedicineStatus;
use App\Http\Controllers\Controller;
use App\Models\online_medicine\ProductMedicine;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function showAllProductMedicine()
    {
        $products = ProductMedicine::where('status', '!=', OnlineMedicineStatus::DELETED)
            ->orderByDesc('id')
            ->get();
        return view('admin.admin.product-medicine.list-products', compact('products'));
    }

    public function detailProductMedicine($id)
    {
        $product = ProductMedicine::find($id);
        return view('admin.admin.product-medicine.detail-product', compact('product'));
    }
}
