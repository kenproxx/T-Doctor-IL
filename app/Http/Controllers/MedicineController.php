<?php

namespace App\Http\Controllers;

use App\Enums\online_medicine\OnlineMedicineStatus;
use App\Enums\TypeProductCart;
use App\Models\Cart;
use App\Models\MedicalFavourite;
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
            ->select('product_medicines.*', 'provinces.name as location_name');

        $medicine10 = $medicines->paginate(10);
        $medicines = $medicines->paginate(16);

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
        $medical_favourites = MedicalFavourite::where('is_favorite', 1);
        if (Auth::check()) {
            $medical_favourites = MedicalFavourite::where('user_id', Auth::user()->id)->where('is_favorite', 1);
        }
        $medical_favourites = json_encode($medical_favourites->pluck('medical_id')->toArray());


        return view('medicine.list', compact('medicines','medicine10', 'categoryMedicines', 'provinces', 'countAllMedicine', 'carts', 'medical_favourites'));
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
        return view('medicine.detailMedicine', compact('medicine', 'categoryMedicines', 'carts', 'id'));
    }

    public function wishList()
    {
        $medicines = ProductMedicine::where('product_medicines.status', OnlineMedicineStatus::APPROVED)
            ->leftJoin('users', 'product_medicines.user_id', '=', 'users.id')
            ->leftJoin('provinces', 'provinces.id', '=', 'users.province_id')
            ->select('product_medicines.*', 'provinces.name as location_name');

        $medicine10 = $medicines->paginate(10);
        $medicines = $medicines->paginate(16);

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
        $medical_favourites = MedicalFavourite::where('is_favorite', 1);
        if (Auth::check()) {
            $medical_favourites = MedicalFavourite::where('user_id', Auth::user()->id)->where('is_favorite', 1);
        }
        $medical_favourites = json_encode($medical_favourites->pluck('medical_id')->toArray());

        return view('medicine.wishlistMedicine', compact('medicines','medicine10', 'categoryMedicines', 'provinces', 'countAllMedicine', 'carts', 'medical_favourites'));
    }

    public function searchOnlineMedicine(Request $request)
    {
        $medicines = ProductMedicine::where('product_medicines.status', OnlineMedicineStatus::APPROVED);

        $name = $request->input('name');
        $filter = $request->input('filter');
        $object = $request->input('object');
        $price = $request->input('price');
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');
        $category = $request->input('category');
        $location = $request->input('location');



        // Tìm kiếm theo filter
        $medicines->when($filter, function ($query) use ($filter) {
            $filterValues = explode(',', $filter);
            $ifFilterValuesHasZero = in_array(0, $filterValues);
            if (!$ifFilterValuesHasZero) {
                $query->whereIn('filter_', $filterValues);
            }
        });

        // Tìm kiếm theo object
        $medicines->when($object, function ($query) use ($object) {
            $objectValues = explode(',', $object);
            $query->whereIn('object_', $objectValues);
        });

        // Tìm kiếm theo giá
        $medicines->when($min_price, function ($query) use ($min_price) {
            $query->where('price', '>=', $min_price);
        });

        $medicines->when($max_price, function ($query) use ($max_price) {
            $query->where('price', '<=', $max_price);
        });

        // Tìm kiếm theo category
        $medicines->when($category, function ($query) use ($category) {
            $query->where('category_id', $category);
        });

        // Tìm kiếm theo location
        $medicines->when($location, function ($query) use ($location) {
            $query->where('provinces.id', $location);
        });
        // Tìm kiếm theo tên
        $medicines->when($name, function ($query) use ($name) {
            $query->where(function ($query) use ($name) {
                $query->orWhere('product_medicines.name', 'like', "%$name%")
                    ->orWhere('product_medicines.name_en', 'like', "%$name%")
                    ->orWhere('product_medicines.name_laos', 'like', "%$name%");
            });
        });


        // Join và select
        $medicines->leftJoin('users', 'product_medicines.user_id', '=', 'users.id')
            ->leftJoin('provinces', 'provinces.id', '=', 'users.province_id')
            ->select('product_medicines.*', 'provinces.name as location_name');

        // Paginate
        $medicines = $medicines->paginate(15);

        // Trả về kết quả
        $response = [
            'min_price' => $min_price,
            'max_price' => $max_price,
            'data' => $medicines,
        ];

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
