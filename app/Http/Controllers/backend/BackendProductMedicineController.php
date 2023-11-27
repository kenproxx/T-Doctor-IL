<?php

namespace App\Http\Controllers\backend;

use App\Enums\online_medicine\OnlineMedicineStatus;
use App\Http\Controllers\Controller;
use App\Models\online_medicine\CategoryProduct;
use App\Models\online_medicine\ProductMedicine;
use Illuminate\Http\Request;

class BackendProductMedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productMedicines = ProductMedicine::where('status', '!=', OnlineMedicineStatus::DELETED)->paginate(10);
        return view('admin.product_medicine.index', compact('productMedicines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoryProductMedicine = CategoryProduct::where('status', 1)->get();
        return view('admin.product_medicine.create', compact('categoryProductMedicine'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductMedicine $productMedicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $productMedicine = ProductMedicine::find($id);
        $categoryProductMedicine = CategoryProduct::where('status', 1)->get();
        return view('admin.product_medicine.edit', compact('productMedicine', 'categoryProductMedicine'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $productMedicine = ProductMedicine::find($id);
        // nếu tìm thấy, thì sửa status = Inactive và thông báo
        if ($productMedicine) {
            $productMedicine->status = OnlineMedicineStatus::DELETED;
            $success = $productMedicine->update();
            if ($success) {
                return response('Xóa sản phẩm thành công !!!', 200);
            } else {
                return response('Xóa sản phẩm thất bại !!!', 400);
            }
        } else {
            return response('Không tìm thấy sản phẩm !!!', 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $params = $request->only(
            'name', 'name_en', 'name_laos',
            'brand_name', 'brand_name_en', 'brand_name_laos',
            'category_id', 'object_', 'filter_', 'price', 'status',
            'description', 'description_en', 'description_laos',
            'unit_price'
        );

        //check name
        if (empty($params['name']) && empty($params['name_en']) && empty($params['name_laos'])) {
            return response('Tên sản phẩm không được để trống', 400);
        }
        //check description
        if (empty($params['description']) && empty($params['description_en']) && empty($params['description_laos'])) {
            return response('Mô tả sản phẩm không được để trống', 400);
        }
        //check brand_name
        if (empty($params['brand_name']) && empty($params['brand_name_en']) && empty($params['brand_name_laos'])) {
            return response('Tên thương hiệu không được để trống', 400);
        }

        //check thumbnail, nếu rỗng thì không thêm vào
        if ($request->hasFile('thumbnail')) {
            $item = $request->file('thumbnail');
            $itemPath = $item->store('product_medicine', 'public');
            $thumbnail = asset('storage/' . $itemPath);
            $params['thumbnail'] = $thumbnail;
        }
        $productMedicine = ProductMedicine::find($request->input('id'));
        $gallery = $productMedicine->gallery;
        if ($request->hasFile('gallery')) {
            $galleryPaths = array_map(function ($image) {
                $itemPath = $image->store('gallery', 'public');
                return asset('storage/' . $itemPath);
            }, $request->file('gallery'));
            $gallery = implode(',', $galleryPaths);
        }

        $productMedicine->gallery = $gallery;

        $productMedicine->fill($params);

        $success = $productMedicine->save();

        if ($success) {
            return response('Cập nhật sản phẩm thành công', 200);
        } else {
            return response('Cập nhật sản phẩm thất bại', 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $params = $request->only(
            'name', 'name_en', 'name_laos',
            'brand_name', 'brand_name_en', 'brand_name_laos',
            'category_id', 'object_', 'filter_', 'price', 'status',
            'description', 'description_en', 'description_laos',
        );

        //check name
        if (empty($params['name']) && empty($params['name_en']) && empty($params['name_laos'])) {
            return response('Tên sản phẩm không được để trống', 400);
        }
        //check description
        if (empty($params['description']) && empty($params['description_en']) && empty($params['description_laos'])) {
            return response('Mô tả sản phẩm không được để trống', 400);
        }
        //check brand_name
        if (empty($params['brand_name']) && empty($params['brand_name_en']) && empty($params['brand_name_laos'])) {
            return response('Tên thương hiệu không được để trống', 400);
        }

        //check thumbnail not null
        if (!$request->hasFile('thumbnail')) {
            return response('Ảnh đại diện không được để trống', 400);
        }

        //check gallery not null
        if (!$request->hasFile('gallery')) {
            return response('Ảnh chi tiết không được để trống', 400);
        }

        if ($request->hasFile('thumbnail')) {
            $item = $request->file('thumbnail');
            $itemPath = $item->store('product_medicine', 'public');
            $thumbnail = asset('storage/' . $itemPath);
            $params['thumbnail'] = $thumbnail;
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

        $productMedicine = new ProductMedicine();

        $productMedicine->gallery = $gallery;
        $productMedicine->user_id = $request->input('user_id');
        $productMedicine->fill($params);

        $success = $productMedicine->save();

        if ($success) {
            return response('Thêm sản phẩm thành công', 200);
        } else {
            return response('Thêm sản phẩm thất bại', 400);
        }

    }
}
