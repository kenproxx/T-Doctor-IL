<?php

namespace App\Http\Controllers\restapi;

use App\Enums\DoctorInfoStatus;
use App\Enums\TypeMedical;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\DoctorInfo;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorInfoApi extends Controller
{
    public function getAll(Request $request)
    {
        $size = $request->input('size');
        if ($size && $size > 0 && is_numeric($size)) {
            $doctorInfos = DoctorInfo::where('status', DoctorInfoStatus::ACTIVE)->orderBy('id', 'DESC')
                ->where('hocham_hocvi', TypeMedical::DOCTORS)
                ->limit($size)->get();
        } else {
            $doctorInfos = DoctorInfo::where('status', DoctorInfoStatus::ACTIVE)->orderBy('id', 'DESC')
                ->where('hocham_hocvi', TypeMedical::DOCTORS)
                ->get();
        }
        return response()->json($doctorInfos);
    }

    public function search(Request $request)
    {
        // Implement search functionality
    }

    public function findByUser($id)
    {
        $doctor_info = DoctorInfo::where('created_by', $id)
            ->where('hocham_hocvi', TypeMedical::DOCTORS)
            ->first();
        if (!$doctor_info || $doctor_info->status != DoctorInfoStatus::ACTIVE) {
            return response('Not found', 404);
        }
        return response()->json($doctor_info);
    }

    public function findByDepartment($id, Request $request)
    {
        $size = $request->input('size');
        if ($size && $size > 0 && is_numeric($size)) {
            $doctor_infos = DoctorInfo::where('department_id', $id)
                ->where('hocham_hocvi', TypeMedical::DOCTORS)
                ->orderBy('id', 'DESC')
                ->limit($size)
                ->get();
        } else {
            $doctor_infos = DoctorInfo::where('department_id', $id)
                ->where('hocham_hocvi', TypeMedical::DOCTORS)
                ->orderBy('id', 'DESC')
                ->get();
        }
        return response()->json($doctor_infos);
    }

    public function detail(Request $request, $id)
    {
        $doctor_infos = DoctorInfo::where('id', $id)
            ->where('hocham_hocvi', TypeMedical::DOCTORS)
            ->first();
        if (!$doctor_infos || $doctor_infos->status != DoctorInfoStatus::ACTIVE) {
            return response('Not found', 404);
        }
        return response()->json($doctor_infos);
    }

    public function getMyDoctor($id)
    {
        $message_doctor = Chat::where('from_user_id', $id)->get();
        $array_to_ids = null;
        foreach ($message_doctor as $message) {
            $array_to_ids[] = $message->to_user_id;
        }
        $array_to_ids = array_unique($array_to_ids);
//        dd($array_to_ids);
        $users = User::whereIn('id', $array_to_ids)
            ->where('status', UserStatus::ACTIVE)
            ->get();
        $array_doctor_ids = null;
        foreach ($users as $user) {
            $array_doctor_ids[] = $user->id;
        }

        $array_doctor_ids = array_unique($array_doctor_ids);
        $doctorInfos = DoctorInfo::whereIn('created_by', $array_doctor_ids)
            ->where('status', DoctorInfoStatus::ACTIVE)
            ->where('created_by', '!=', $id)
            ->where('hocham_hocvi', TypeMedical::DOCTORS)
            ->get();

        return response()->json($doctorInfos);
    }
}
