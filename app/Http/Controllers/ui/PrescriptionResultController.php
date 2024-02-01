<?php

namespace App\Http\Controllers\ui;

use App\Enums\PrescriptionResultStatus;
use App\Http\Controllers\Controller;
use App\Models\PrescriptionResults;

class PrescriptionResultController extends Controller
{
    public function create()
    {
        return view('ui.prescription-results.create');
    }

    public function myPrescription()
    {
        return view('ui.prescription-results.my-prescriptions');
    }

    public function doctorPrescription()
    {
        return view('ui.prescription-results.doctor-prescriptions');
    }

    public function detail($id)
    {
        $prescription = PrescriptionResults::find($id);
        if (!$prescription || $prescription->status == PrescriptionResultStatus::DELETED) {
            alert()->warning('Not found result!');
            return back();
        }

        $value_result = '[' . $prescription->prescriptions . ']';
        $array_result = json_decode($value_result, true);
        return view('ui.prescription-results.detail', compact('array_result', 'prescription'));
    }
}
