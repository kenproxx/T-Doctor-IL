<?php

namespace App\Http\Controllers\backend;

use App\Enums\ProductStatus;
use App\Http\Controllers\Controller;
use App\Models\ProductInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackendProductInfoController extends Controller
{
    public function index()
    {
        $products = ProductInfo::where('status', '!=', ProductStatus::DELETED)->get();
        return response()->json($products);
    }

    public function getByUser(Request $request, $id)
    {
        $status = $request->input('status');
        if ($status) {
            $products = ProductInfo::where('status', $status)->where('created_by', $id)->get();
        } else {
            $products = ProductInfo::where('status', '!=', ProductStatus::DELETED)->where('created_by', $id)->get();
        }
        return response()->json($products);
    }

    public function store(Request $request)
    {
        try {
            $name = $request->input('name');
            $category_id = $request->input('category_id');
            $name_en = $request->input('name_en');
            $brand_name = $request->input('brand_name');
            $brand_name_en = $request->input('brand_name_en');
            $province_id = $request->input('province_id');

            if ($request->hasFile('thumbnail')) {
                $item = $request->file('thumbnail');
                $itemPath = $item->store('product', 'public');
                $thumbnail = asset('storage/' . $itemPath);
            } else {
                $thumbnail = '';
            }

            if ($request->hasFile('gallery')) {
                $galleryPaths = array_map(function ($image) {
                    $itemPath = $image->store('gallery', 'public');
                    return asset('storage/' . $itemPath);
                }, $request->file('gallery'));
                $gallery = implode(',', $galleryPaths);
            } else {
                $gallery = '';
            }

            $price = $request->input('price');
            $price_unit = $request->input('price_unit');
            $ads_plan = $request->input('ads_plan');
            $ads_period = $request->input('ads_period');
            $status = $request->input('status');
            $userID = $request->input('user_id');

            $product = new ProductInfo();

            $product->name = $name;
            $product->name_en = $name_en;
            $product->category_id = $category_id;
            $product->brand_name = $brand_name;
            $product->brand_name_en = $brand_name_en;
            $product->province_id = $province_id;
            $product->thumbnail = $thumbnail;
            $product->gallery = $gallery;
            $product->price = $price;
            $product->price_unit = $price_unit;
            $product->ads_plan = $ads_plan;
            $product->ads_period = $ads_period;
            $product->status = $status;
            $product->created_by = $userID;

            $success = $product->save();
            if ($success) {
                return response()->json($product);
            }
            return response('Create error', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

    public function show($id)
    {
        $product = ProductInfo::find($id);
        if (!$product || $product->status == ProductStatus::DELETED) {
            return response("Product not found", 404);
        }
        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        try {
            $product = ProductInfo::find($id);
            if (!$product || $product->status == ProductStatus::DELETED) {
                return response("Product not found", 404);
            }

            $name = $request->input('name');
            $category_id = $request->input('category_id');
            $name_en = $request->input('name_en');
            $brand_name = $request->input('brand_name');
            $brand_name_en = $request->input('brand_name_en');
            $province_id = $request->input('province_id');

            if ($request->hasFile('thumbnail')) {
                $item = $request->file('thumbnail');
                $itemPath = $item->store('product', 'public');
                $thumbnail = asset('storage/' . $itemPath);
            } else {
                $thumbnail = $product->thumbnail;
            }

            if ($request->hasFile('gallery')) {
                $galleryPaths = array_map(function ($image) {
                    $itemPath = $image->store('gallery', 'public');
                    return asset('storage/' . $itemPath);
                }, $request->file('gallery'));
                $gallery = implode(',', $galleryPaths);
            } else {
                $gallery = $product->gallery;
            }

            $price = $request->input('price');
            $price_unit = $request->input('price_unit');
            $ads_plan = $request->input('ads_plan');
            $ads_period = $request->input('ads_period');
            $status = $request->input('status');
            $userID = $request->input('user_id');

            $product->name = $name;
            $product->name_en = $name_en;
            $product->category_id = $category_id;
            $product->brand_name = $brand_name;
            $product->brand_name_en = $brand_name_en;
            $product->province_id = $province_id;
            $product->thumbnail = $thumbnail;
            $product->gallery = $gallery;
            $product->price = $price;
            $product->price_unit = $price_unit;
            $product->ads_plan = $ads_plan;
            $product->ads_period = $ads_period;
            $product->status = $status;
            $product->updated_by = $userID;

            $success = $product->save();
            if ($success) {
                return response()->json($product);
            }
            return response('Update error', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

    public function destroy($id)
    {
        try {
            $product = ProductInfo::find($id);
            if (!$product || $product->status == ProductStatus::DELETED) {
                return response("Product not found", 404);
            }
            $product->status = ProductStatus::DELETED;
            $success = $product->save();
            if ($success) {
                return response('Delete success', 200);
            }
            return response('Delete error', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }
}
