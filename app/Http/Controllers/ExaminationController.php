<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ExaminationController extends Controller
{
    public function index()
    {
        return view('Examination.index');
    }
    public function infoDoctor()
    {
        return view('Examination.infodoctor');
    }

    public function bestDoctor(){
        return view('Examination.bestdoctor');
    }
    public function newDoctor(){
        return view('Examination.newdoctor');
    }
    public function availableDoctor(){
        return view('Examination.availabledoctor');
    }
    public function findMyMedicine(){
        return view('Examination.findmymedicine');
    }
    public function bestPharmacists(){
        return view('Examination.bestpharmacists');
    }
    public function newPharmacists(){
        return view('Examination.newpharmacists');
    }
    public function availablePharmacists(){
        return view('Examination.availablepharmacists');
    }
    public function hotDealMedicine(){
        return view('Examination.hotdealmedicine');
    }
    public function newMedicine(){
        return view('Examination.newmedicine');
    }
    public function recommended(){
        return view('Examination.recommended');
    }

}
