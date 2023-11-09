<?php

namespace App\Http\Controllers;

use App\Enums\DoctorInfoStatus;
use App\Models\DoctorInfo;
use Illuminate\Http\Request;

class DoctorInfoController extends Controller
{
    public function index()
    {
        //
    }

    public function show($id)
    {
        $coupon = DoctorInfo::find($id);
        if (!$coupon || $coupon->status != DoctorInfoStatus::ACTIVE) {
            return response("coupon not found", 404);
        }
        return response()->json($coupon, $id);
    }

    public function showFromQrCode()
    {
        return view('qrCode.doctor-info');
    }

    public function create()
    {
        return view('admin.doctor.tab-create-doctor');
    }

    public function edit($id)
    {
        $doctor = DoctorInfo::find($id);
        if (!$doctor) {
            return response("doctor not found", 404);
        }
        return view('admin.doctor.tab-edit-doctor', compact('doctor'));
    }
}
