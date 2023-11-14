<?php

namespace App\Http\Controllers\restapi;

use App\Enums\DoctorInfoStatus;
use App\Http\Controllers\Controller;
use App\Models\DoctorInfo;
use Illuminate\Http\Request;

class DoctorInfoApi extends Controller
{
    public function getAll(Request $request)
    {
        $size = $request->input('size');
        if ($size && $size > 0 && is_numeric($size)) {
            $doctorInfos = DoctorInfo::where('status', DoctorInfoStatus::ACTIVE)->orderBy('id', 'DESC')->limit($size)->get();
        } else {
            $doctorInfos = DoctorInfo::where('status', DoctorInfoStatus::ACTIVE)->orderBy('id', 'DESC')->get();
        }
        return response()->json($doctorInfos);
    }

    public function search(Request $request)
    {
        // Implement search functionality
    }

    public function findByUser($id)
    {
        $doctor_infos = DoctorInfo::where('created_by', $id)->first();
        if (!$doctor_infos || $doctor_infos->status != DoctorInfoStatus::ACTIVE) {
            return response('Not found', 404);
        }
        return response()->json($doctor_infos);
    }

    public function detail(Request $request, $id)
    {
        $doctor_infos = DoctorInfo::where('id', $id)->first();
        if (!$doctor_infos || $doctor_infos->status != DoctorInfoStatus::ACTIVE) {
            return response('Not found', 404);
        }
        return response()->json($doctor_infos);
    }
}
