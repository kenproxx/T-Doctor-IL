<?php

namespace App\Http\Controllers;

use App\Enums\online_medicine\OnlineMedicineStatus;
use App\Models\Cart;
use App\Models\online_medicine\CategoryProduct;
use App\Models\online_medicine\ProductMedicine;
use Illuminate\Support\Facades\Auth;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = ProductMedicine::where('status', OnlineMedicineStatus::APPROVED)->paginate(16);
        return view('medicine.list', compact('medicines'));
    }

    public function detail($id)
    {
        $medicine = ProductMedicine::find($id);
        $categoryMedicines = CategoryProduct::where('status', true)->get();
        $carts = null;
        if (Auth::check()) {
            $carts = Cart::where('user_id', Auth::user()->id)->get();
        }
        return view('medicine.detailMedicine', compact('medicine', 'categoryMedicines', 'carts'));
    }

    public function wishList()
    {
        return view('medicine.wishlistMedicine');
    }
}
