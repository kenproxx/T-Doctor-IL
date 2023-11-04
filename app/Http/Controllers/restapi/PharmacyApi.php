<?php

namespace App\Http\Controllers\restapi;

use App\Enums\ClinicStatus;
use App\Enums\TypeBussiness;
use App\Http\Controllers\Controller;
use App\Models\Clinic;
use Illuminate\Http\Request;

class PharmacyApi extends Controller
{
    public function getAll()
    {
        $pharmacies = Clinic::where('status', ClinicStatus::ACTIVE)->where('type', TypeBussiness::PHARMACIES)->get();
        return response()->json($pharmacies);
    }

    public function detail($id)
    {
        $pharmacy = Clinic::find($id);
        if (!$pharmacy || $pharmacy->status != ClinicStatus::ACTIVE) {
            return response("Clinic not found", 404);
        }
        return response()->json($pharmacy);
    }

    public function getAllByUserId($id)
    {
        $pharmacies = Clinic::where([
            ['status', ClinicStatus::ACTIVE],
            ['type', TypeBussiness::PHARMACIES],
            ['user_id', $id]
        ])->get();
        return response()->json($pharmacies);
    }
}
