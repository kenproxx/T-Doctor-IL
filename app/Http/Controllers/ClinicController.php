<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClinicController extends Controller
{

    public function index()
    {
        return view('clinics.listClinics');
    }

    public function detail()
    {
        return view('clinics.detailClinics');
    }
}
