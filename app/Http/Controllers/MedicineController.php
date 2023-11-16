<?php

namespace App\Http\Controllers;

use App\Enums\online_medicine\OnlineMedicineStatus;
use App\Models\online_medicine\CategoryProduct;
use App\Models\online_medicine\ProductMedicine;

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
        return view('medicine.detailMedicine', compact('medicine', 'categoryMedicines'));
    }

    public function wishList()
    {
        return view('medicine.wishlistMedicine');
    }
}
