<?php

namespace App\Http\Controllers\restapi;

use App\Enums\TypeMedical;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
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

    private function getMedical($type, $symptomID, $department)
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

    public function searchMedical(Request $request)
    {
        $star = $request->input('star');

        $fullTime = $request->input('fulltime');
        $experience = $request->input('experience');
        $type = $request->input('type');
        $medicals = $this->processSearchMedical($type, $star, $experience);
        return response()->json($medicals);
    }

    private function processSearchMedical($type, $star, $experience)
    {
        if (!$type) {
            $type = TypeMedical::DOCTORS;
        }
        $query = DB::table('users')
            ->where('users.type', $type)
            ->where('users.status', UserStatus::ACTIVE);

        if ($experience) {
            $aboutYear = explode('-', $experience);
            $minYear = $aboutYear[0];
            $maxYear = $aboutYear[1];
            $query->whereBetween('users.year_of_experience', [$minYear, $maxYear]);
        }

        if ($star) {
            $aboutStar = explode('-', $star);
            $minStar = $aboutStar[0];
            $maxStar = $aboutStar[1];
            $query->whereBetween('users.average_star', [$minStar, $maxStar]);
        }

        $result = $query->orderBy('users.id', 'desc')->get();
        return $result;
    }
}
