<?php

namespace App\Http\Controllers\restapi;

use App\Enums\SymptomStatus;
use App\Http\Controllers\Controller;
use App\Models\Symptom;

class SymptomsApi extends Controller
{
    public function getList()
    {
        $symptoms = Symptom::where('status', SymptomStatus::ACTIVE)
            ->orderBy('id', 'desc')
            ->get();
        return response()->json($symptoms);
    }

    public function detail($id)
    {
        $symptom = Symptom::find($id);
        if (!$symptom || $symptom->status != SymptomStatus::ACTIVE) {
            return response('Not found!', 404);
        }
        return response()->json($symptom);
    }
}
