<?php

namespace App\Http\Controllers;

use App\Enums\ProductStatus;
use App\Models\ProductInfo;

class ProductInfoController extends Controller
{
    public function index()
    {
        $products = ProductInfo::where('status', ProductStatus::ACTIVE)->get();
        return response()->json($products);
    }

    public function show($id)
    {
        $product = ProductInfo::find($id);
        if (!$product || $product->status != ProductStatus::ACTIVE) {
            return response("Product not found", 404);
        }
        return response()->json($product);
    }

    public function createProduct()
    {
        return view('admin.tab-create-products');
    }

    public function edit($id)
    {
        $product = ProductInfo::find($id);
        if (!$product || $product->status == ProductStatus::DELETED) {
            return redirect(route('homeAdmin.list.product'));
        }
        return view('admin.tab-edit-product', compact('product'));
    }
}
