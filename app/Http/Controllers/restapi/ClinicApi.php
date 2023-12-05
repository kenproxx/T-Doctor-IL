<?php

namespace App\Http\Controllers\restapi;

use App\Enums\ClinicStatus;
use App\Enums\TypeBussiness;
use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClinicApi extends Controller
{
    public function getAll()
    {
        $clinics = DB::table('clinics')
            ->join('users', 'users.id', '=', 'clinics.user_id')
            ->where('clinics.status', ClinicStatus::ACTIVE)
            ->where('clinics.type', TypeBussiness::CLINICS)
            ->select('clinics.*', 'users.email')
            ->cursor()
            ->map(function ($item) {
                $array = explode(',', $item->service_id);
                $services = \App\Models\ServiceClinic::whereIn('id', $array)->get();
                $array = explode(',', $item->address);
                $addressP = \App\Models\Province::where('id', $array[1] ?? null)->first();
                $addressD = \App\Models\District::where('id', $array[2] ?? null)->first();
                $addressC = \App\Models\Commune::where('id', $array[3] ?? null)->first();
                $clinic = (array)$item;
                $clinic['total_services'] = $services->count();
                $clinic['services'] = $services->toArray();
                if ($addressP == null) {
                    $clinic['addressInfo'] = '';
                    return $clinic;
                }
                $clinic['addressInfo'] = $addressC['name'] . ',' . $addressD['name'] . ',' . $addressP['name'];
                return $clinic;
            });

        return response()->json($clinics);
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

    public function detail($id)
    {
        $clinic = Clinic::find($id);
        if (!$clinic || $clinic->status != ClinicStatus::ACTIVE) {
            return response("Clinic not found", 404);
        }
        $user = User::find($clinic->user_id);
        $response = $clinic->toArray();
        $response['email'] = $user->email;
        return response()->json($response);
    }

    public function getAllByUserId($id)
    {
        $clinics = DB::table('clinics')
            ->join('users', 'users.id', '=', 'clinics.user_id')
            ->where('clinics.status', ClinicStatus::ACTIVE)
            ->where('clinics.type', TypeBussiness::CLINICS)
            ->where('clinics.user_id', $id)
            ->select('clinics.*', 'users.email')
            ->get();
        return response()->json($clinics);
    }
}
