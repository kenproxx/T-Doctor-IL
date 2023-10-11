<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    //
    public function index(){
        return view('recruitment');
    }

    public function recruitment_detail(){
        return view('recruitment_details');
    }
}
