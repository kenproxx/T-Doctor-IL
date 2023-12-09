<?php

namespace App\Http\Controllers\restapi;

use App\Enums\TypeMedical;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Symptom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicalApi extends Controller
{
    public function searchByDepartmentAndSymptoms(Request $request)
    {
        $symptomID = $request->input('symptom');
        $type = $request->input('type');
        $department = $request->input('department');
        $medicals = $this->getMedical($type, $symptomID, $department);
        return response()->json($medicals);
    }

    public function getMedical($type, $symptomID, $department)
    {
        if (!$type) {
            $type = TypeMedical::DOCTORS;
        }
        $listDoctor = User::where('member', $type)
            ->where('status', UserStatus::ACTIVE)
            ->when($symptomID, function ($query) use ($symptomID) {
                return $query->whereRaw("FIND_IN_SET(?, symptom_id) > 0", [$symptomID]);
            })
            ->when($department, function ($query) use ($department) {
                return $query->whereRaw("FIND_IN_SET(?, department_id) > 0", [$department]);
            })
            ->orderBy('id', 'desc')
            ->get();
        return response()->json($listDoctor);
    }
}
