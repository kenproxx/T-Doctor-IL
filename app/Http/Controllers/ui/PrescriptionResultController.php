<?php

namespace App\Http\Controllers\ui;

use App\Enums\PrescriptionResultStatus;
use App\Http\Controllers\Controller;
use App\Models\PrescriptionResults;
use App\Models\User;
use Illuminate\Http\Request;

class PrescriptionResultController extends Controller
{
    public function create(Request $request)
    {
        $user_id = $request->input('user_id');
        $user = User::find($user_id);

        return view('ui.prescription-results.create', compact('user'));
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
