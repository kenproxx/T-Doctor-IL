<?php

namespace App\Http\Controllers;

use App\Enums\DoctorInfoStatus;
use App\Models\Chat;
use App\Models\DoctorInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return response("doctor not found", 404);
        }
        return response()->json($coupon, $id);
    }

    public function showFromQrCode($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $messageDoctor = Chat::where([
                ['from_user_id', $id],
                ['to_user_id', $user->id]
            ])->orWhere([
                ['to_user_id', $id],
                ['from_user_id', $user->id]
            ])->get();
            $doctor = DoctorInfo::find($id);
            return view('qrCode.doctor-info', compact('messageDoctor', 'doctor'));
        }
        return redirect(route('home'));
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
