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
