<?php

namespace App\Http\Controllers\restapi;

use App\Enums\ClinicStatus;
use App\Http\Controllers\Controller;
use App\Models\Clinic;
use Illuminate\Http\Request;

class BusinessApi extends Controller
{
    public function getList(Request $request)
    {
        $type = $request->input('type');
        if ($type) {
            $items = Clinic::where('status', ClinicStatus::ACTIVE)
                ->where('type', $type)
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $items = Clinic::where('status', ClinicStatus::ACTIVE)
                ->orderBy('id', 'desc')
                ->get();
        }
        return response()->json($items);
    }
}
