<?php

namespace App\Http\Controllers;

use App\Enums\online_medicine\OnlineMedicineStatus;
use App\Enums\TypeProductCart;
use App\Models\Cart;
use App\Models\online_medicine\CategoryProduct;
use App\Models\online_medicine\ProductMedicine;
use Illuminate\Support\Facades\Auth;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = ProductMedicine::where('product_medicines.status', OnlineMedicineStatus::APPROVED)
            ->leftJoin('users', 'product_medicines.user_id', '=', 'users.id')
            ->leftJoin('provinces', 'provinces.id', '=', 'users.province_id')
            ->select('product_medicines.*', 'provinces.name as location_name')
            ->paginate(15);

        // count all medicine
        $countAllMedicine = ProductMedicine::where('product_medicines.status', OnlineMedicineStatus::APPROVED)->count();
        $categoryMedicines = CategoryProduct::where('status', true)->get();

        //get all product in cart by user_id
        $carts = null;
        if (Auth::check()) {
            $carts = Cart::where('user_id', Auth::user()->id)
                ->where('type_product', TypeProductCart::MEDICINE)
                ->get();
        }
        $provinces = Province::all();

        return view('medicine.list', compact('medicines', 'categoryMedicines', 'provinces', 'countAllMedicine', 'carts'));
    }

    public function detail($id)
    {
        $medicine = ProductMedicine::find($id);
        $categoryMedicines = CategoryProduct::where('status', true)->get();
        $carts = null;
        if (Auth::check()) {
            $carts = Cart::where('user_id', Auth::user()->id)
                ->where('type_product', TypeProductCart::MEDICINE)
                ->get();
        }
        return view('medicine.detailMedicine', compact('medicine', 'categoryMedicines', 'carts'));
    }

    public function wishList()
    {
        return view('medicine.wishlistMedicine');
    }

    public function searchOnlineMedicine(Request $request)
    {
        // Bắt đầu với tất cả các sản phẩm y tế được phê duyệt
        $medicines = ProductMedicine::where('product_medicines.status', OnlineMedicineStatus::APPROVED);

        // Lấy giá trị từ các tham số yêu cầu
        $filter = $request->input('filter');
        $object = $request->input('object');
        $price = $request->input('price');
        $category = $request->input('category');
        $location = $request->input('location');
        // Kiểm tra và áp dụng điều kiện tìm kiếm
        if ($filter) {
            $filterValues = explode(',', $filter);
            //kiểm tra nếu trong $filterValues có phần tử 0, => filter = ''

            $ifFilterValuesHasZero = in_array(0, $filterValues);
            if (!$ifFilterValuesHasZero) {
                $medicines->whereIn('filter_', $filterValues);
            }
        }
        if ($object) {
            $objectValues = explode(',', $object);
            $medicines->whereIn('object_', $objectValues);
        }
        if ($price) {
            $medicines->where('price', '<=', $price);
        }
        if ($category) {
            $medicines->where('category_id', $category);
        }
        if ($location) {
            $medicines->where('provinces.id', $location);
        }

        $medicines
            ->leftJoin('users', 'product_medicines.user_id', '=', 'users.id')
            ->leftJoin('provinces', 'provinces.id', '=', 'users.province_id')
            ->select('product_medicines.*', 'provinces.name as location_name');

        // Lấy dữ liệu đã lọc và phân trang
        $medicines = $medicines->paginate();

        // Hiển thị dữ liệu đã lọc
        return response()->json($medicines);
    }

    public function getLocationByUserId(Request $request)
    {
        $user = User::find($request->input('user_id'));
        $location_id = $user->province_id;
        $nameLocation = Province::find($location_id)->full_name;
        return response()->json($nameLocation);
    }

}
