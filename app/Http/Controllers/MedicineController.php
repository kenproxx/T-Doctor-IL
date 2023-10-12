<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        return view('online_Medicine');
    }

    public function detail()
    {
        return view('product_details');
    }
}
