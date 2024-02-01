<?php

namespace App\Http\Controllers\ui;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrescriptionResultController extends Controller
{
    public function create()
    {
        return view('ui.prescription-results.create');
    }
}
