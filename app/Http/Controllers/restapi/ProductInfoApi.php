<?php

namespace App\Http\Controllers\restapi;

use App\Enums\ProductStatus;
use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\ProductInfo;
use Illuminate\Http\Request;

class ProductInfoApi extends Controller
{
    public function index()
    {
        $products = ProductInfo::where('status', ProductStatus::ACTIVE)->get();
        return response()->json($products);
    }

    public function getAllByCategory($id)
    {
        $products = ProductInfo::where('status', ProductStatus::ACTIVE)->where('category_id', $id)->get();
        return response()->json($products);
    }

    public function getByUser(Request $request, $id)
    {
        $products = ProductInfo::where('status', ProductStatus::ACTIVE)->where('created_by', $id)->get();
        return response()->json($products);
    }

    public function getById(Request $request, $id)
    {
        $product = ProductInfo::find($id);
        if (!$product || $product->status != ProductStatus::ACTIVE) {
            return response('Not found');
        }
        return response()->json($product);
    }

    public function search(Request $request)
    {
        $name = $request->input('name');
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');
        $status = ProductStatus::ACTIVE;
        $category_id = $request->input('category_id');
        $categories = explode(',', $category_id);
        $query = [];

        if ($name) {
            $str = ['name', 'like', '%' . $name . '%'];
            array_push($query, $str);
        }
        if ($status) {
            $str = ['status', '=', $status];
            array_push($query, $str);
        }

        if ($min_price) {
            $str = ['price', '>=', $min_price];
            array_push($query, $str);
        }

        if ($max_price) {
            $str = ['price', '<=', $max_price];
            array_push($query, $str);
        }

        if ($category_id) {
            $products = ProductInfo::where($query)->whereIn('category_id', $categories)->get();
        } elseif (!$name && !$status && !$min_price && !$max_price) {
            $products = ProductInfo::where('status', ProductStatus::ACTIVE)->get();
        } else {
            $products = ProductInfo::where($query)->get();
        }
        return response()->json($products);
    }

    public function getByClinic(Request $request, $id)
    {
        $status = $request->input('status');
        $products = null;
        $clinic = Clinic::find($id);
        if ($status) {
            if ($clinic) {
                $products = ProductInfo::where('status', $status)
                    ->where('created_by', $clinic->user_id)
                    ->get();
            }
        } else {
            if ($clinic) {
                $products = ProductInfo::where('status', '!=', ProductStatus::DELETED)
                        ->where('created_by', $clinic->user_id)
                    ->get();
            }
        }
        return response()->json($products);
    }
}
