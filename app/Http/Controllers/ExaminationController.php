<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ExaminationController extends Controller
{
    public function index()
    {
        return view('examination.index');
    }

    public function bestDoctor(){
        return view('examination.bestdoctor');
    }
    public function newDoctor(){
        return view('examination.newdoctor');
    }
    public function availableDoctor(){
        return view('examination.availabledoctor');
    }
}
