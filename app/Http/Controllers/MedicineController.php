<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        return view('medicine.list');
    }

    public function detail()
    {
        return view('medicine.detailMedicine');
    }

    public function wishList()
    {
        return view('medicine.wishlistMedicine');
    }
}
