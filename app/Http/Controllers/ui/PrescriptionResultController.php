<?php

namespace App\Http\Controllers\ui;

use App\Enums\PrescriptionResultStatus;
use App\Http\Controllers\Controller;
use App\Models\online_medicine\ProductMedicine;
use App\Models\PrescriptionResults;
use App\Models\User;
use Illuminate\Http\Request;

class PrescriptionResultController extends Controller
{
    public function create(Request $request)
    {
        $user_id = $request->input('user_id');
        $user = User::find($user_id);
        $listMedicine = ProductMedicine::where('quantity', '>', 0)->get();

        return view('ui.prescription-results.create', compact('user', 'listMedicine'));
    }

    public function myPrescription()
    {
        return view('ui.prescription-results.my-prescriptions');
    }

    public function doctorPrescription()
    {
        return view('ui.prescription-results.doctor-prescriptions');
    }
    public function getListMedicine(Request $request)
    {
        $name_search = $request->input('name_search');

        $listMedicine = ProductMedicine::where('quantity', '>', 0);

        if ($name_search) {
            $listMedicine = $listMedicine->where('name', 'like', '%' . $name_search . '%');
        }

        $listMedicine = $listMedicine->get();
        return response()->json($listMedicine);
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
