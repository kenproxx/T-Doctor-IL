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
            ->get();
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
