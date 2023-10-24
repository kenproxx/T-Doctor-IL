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

    public function delete($id)
    {
        $product = ProductInfo::find($id);
        if (!$product || $product->status == ProductStatus::DELETED) {
            return redirect(route('api.backend.products.list'));
        }
        $product->status == ProductStatus::DELETED;
        $product->save();
        alert()->success('Success', 'Delete news success!');
        return redirect(route('admin.news.list'));
    }
}
