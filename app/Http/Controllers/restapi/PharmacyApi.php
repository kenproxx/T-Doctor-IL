<?php

namespace App\Http\Controllers\restapi;

use App\Enums\ClinicStatus;
use App\Enums\TypeBussiness;
use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PharmacyApi extends Controller
{
    public function getAll()
    {
        $pharmacies = DB::table('clinics')
            ->join('users', 'users.id', '=', 'clinics.user_id')
            ->where('clinics.status', ClinicStatus::ACTIVE)
            ->where('clinics.type', TypeBussiness::PHARMACIES)
            ->select('clinics.*', 'users.email')
            ->get();
        return response()->json($pharmacies);
    }

    public function detail($id)
    {
        $pharmacy = Clinic::find($id);
        if (!$pharmacy || $pharmacy->status != ClinicStatus::ACTIVE) {
            return response("Pharmacy not found", 404);
        }
        $user = User::find($pharmacy->user_id);
        $response = $pharmacy->toArray();
        $response['email'] = $user->email;
        return response()->json($response);
    }

    public function searchByDepartmentAndSymptoms(Request $request)
    {
        $symptomID = $request->input('symptom');
        $department = $request->input('department');
        if ($symptomID && $department) {
            $clinics = Clinic::whereRaw("FIND_IN_SET(?, symptom) > 0", [$symptomID])
                ->whereRaw("FIND_IN_SET(?, department) > 0", [$department])
                ->where('status', ClinicStatus::ACTIVE)
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $clinics = Clinic::whereRaw("FIND_IN_SET(?, symptom) > 0", [$symptomID])
                ->orWhereRaw("FIND_IN_SET(?, department) > 0", [$department])
                ->where('status', ClinicStatus::ACTIVE)
                ->orderBy('id', 'desc')
                ->get();
        }

        return response()->json($clinics);
    }

    public function getAllByUserId($id)
    {
        $pharmacies = DB::table('clinics')
            ->join('users', 'users.id', '=', 'clinics.user_id')
            ->where('clinics.status', ClinicStatus::ACTIVE)
            ->where('clinics.type', TypeBussiness::PHARMACIES)
            ->where('clinics.user_id', $id)
            ->select('clinics.*', 'users.email')
            ->get();
        return response()->json($pharmacies);
    }
}
