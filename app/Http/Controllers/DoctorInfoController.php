<?php

namespace App\Http\Controllers;

use App\Enums\DoctorDepartmentStatus;
use App\Enums\DoctorInfoStatus;
use App\Enums\Role;
use App\Enums\UserStatus;
use App\Models\Chat;
use App\Models\DoctorDepartment;
use App\Models\DoctorInfo;
use App\Models\User;
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
        $departments = DoctorDepartment::where('status', DoctorDepartmentStatus::ACTIVE)->get();
        $users = $this->returnListUser();
        return view('admin.doctor.tab-create-doctor', compact('departments', 'users'));
    }

    public function edit($id)
    {
        $doctor = DoctorInfo::find($id);
        if (!$doctor) {
            return response("doctor not found", 404);
        }
        $users = $this->returnListUser();
        $departments = DoctorDepartment::where('status', DoctorDepartmentStatus::ACTIVE)->get();
        return view('admin.doctor.tab-edit-doctor', compact('doctor', 'departments', 'users'));
    }

    private function returnListUser()
    {
        $listUsers = User::whereHas('roles', function ($query) {
            $query->where('role_id', 11);
        })->get();
        $users = null;
        foreach ($listUsers as $user) {
            $doctor = DoctorInfo::where('created_by', $user->id)->where('status', '!=', DoctorInfoStatus::DELETED)->first();
            if (!$doctor) {
                $users[] = $user;
            }
        }
        return collect($users);
    }
}
