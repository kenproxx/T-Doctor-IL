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
    public function findMyMedicine(){
        return view('examination.findmymedicine');
    }
    public function bestPharmacists(){
        return view('examination.bestpharmacists');
    }
    public function newPharmacists(){
        return view('examination.newpharmacists');
    }
    public function availablePharmacists(){
        return view('examination.availablepharmacists');
    }
    public function hotDealMedicine(){
        return view('examination.hotdealmedicine');
    }
    public function newMedicine(){
        return view('examination.newmedicine');
    }
    public function recommended(){
        return view('examination.recommended');
    }

}
