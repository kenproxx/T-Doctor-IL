<?php

namespace App\Http\Controllers\backend;

use App\Enums\ProductStatus;
use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\ProductInfo;
use App\Models\WishList;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackendProductInfoController extends Controller
{
    public function index()
    {
        $products = DB::table('product_infos')
            ->join('provinces', 'provinces.id', '=', 'product_infos.province_id')
            ->where('product_infos.status', '!=', ProductStatus::DELETED)
            ->select('product_infos.*', 'provinces.name as province_name')
            ->get();

        if (Auth::check()) {
            $userId = Auth::user()->id;

            $products->each(function ($product) use ($userId) {
                $isFavorite = WishList::where('product_id', $product->id)
                    ->where('user_id', $userId)
                    ->value('isFavorite');

                $product->isFavorit = $isFavorite == 1 ? true : false;
            });
        }


        return response()->json($products);
    }

    public function getAllByCategory(Request $request, $id)
    {
        $status = $request->input('status');
        if ($status) {
            $products = ProductInfo::where('status', $status)->where('category_id', $id)->get();
        } else {
            $products = ProductInfo::where('status', '!=', ProductStatus::DELETED)->where('category_id', $id)->get();
        }
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

    public function search(Request $request)
    {
        $name = $request->input('name');
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');
        $status = $request->input('status');
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
            $products = ProductInfo::where('status', '!=', ProductStatus::DELETED)->get();
        } else {
            $products = ProductInfo::where($query)->get();
        }
        return response()->json($products);
    }

    public function getByClinicMain(Request $request, $id)
    {
        $status = $request->input('status');
        $clinic = Clinic::find($id);
        if ($status) {
            $products = ProductInfo::where('status', $status)->where('created_by', $clinic->user_id)->get();
        } else {
            $products = ProductInfo::where('status', '!=', ProductStatus::DELETED)->where('', $clinic->user_id)->get();
        }
        return response()->json($products);
    }

    public function getByClinic(Request $request, $id)
    {
        $status = $request->input('status');
        if ($status) {
            $products = DB::table('product_infos')
                ->join('clinics', 'clinics.user_id', '=', 'product_infos.created_by')
                ->where('clinics.id', $id)
                ->where('product_infos.status', '=', $status)
                ->select('product_infos.*')
                ->get();
        } else {
            $products = DB::table('product_infos')
                ->join('clinics', 'clinics.user_id', '=', 'product_infos.created_by')
                ->where('clinics.user_id', $id)
                ->where('product_infos.status', '!=', ProductStatus::DELETED)
                ->select('product_infos.*')
                ->get();
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
            $description = $request->input('description');
            $description_en = $request->input('description_en');
            $description_laos = $request->input('description_laos');

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
            $product->description = $description;
            $product->description_en = $description_en;
            $product->description_laos = $description_laos;
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
            $name_laos = $request->input('name_laos');
            $brand_name = $request->input('brand_name');
            $brand_name_en = $request->input('brand_name_en');
            $brand_name_laos = $request->input('brand_name_laos');
            $province_id = $request->input('province_id');
            $description = $request->input('description');
            $description_en = $request->input('description_en');
            $description_laos = $request->input('description_laos');

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
            $product->name_laos = $name_laos;
            $product->category_id = $category_id;
            $product->brand_name = $brand_name;
            $product->brand_name_en = $brand_name_en;
            $product->brand_name_laos = $brand_name_laos;
            $product->province_id = $province_id;
            $product->thumbnail = $thumbnail;
            $product->gallery = $gallery;
            $product->price = $price;
            $product->price_unit = $price_unit;
            $product->ads_plan = $ads_plan;
            $product->ads_period = $ads_period;
            $product->description = $description;
            $product->description_en = $description_en;
            $product->description_laos = $description_laos;
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
