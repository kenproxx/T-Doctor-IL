<?php

namespace App\Http\Controllers\restapi;

use App\Enums\PrescriptionResultStatus;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\PrescriptionResults;
use App\Models\User;
use Illuminate\Http\Request;

class PrescriptionResultApi extends Controller
{
    public function listPrescription(Request $request)
    {
        $prescriptions = PrescriptionResults::where('status', PrescriptionResultStatus::ACTIVE)
            ->orderByDesc('id')
            ->get();
        return response()->json($prescriptions);
    }

    public function listPrescriptionByUser(Request $request)
    {
        $user_id = $request->input('user_id');
        $prescriptions = PrescriptionResults::where('user_id', $user_id)
            ->where('status', PrescriptionResultStatus::ACTIVE)
            ->orderByDesc('id')
            ->get();
        return response()->json($prescriptions);
    }

    public function listPrescriptionByDoctor(Request $request)
    {
        $user_id = $request->input('user_id');
        $prescriptions = PrescriptionResults::where('user_id', $user_id)
            ->where('status', PrescriptionResultStatus::ACTIVE)
            ->orderByDesc('id')
            ->get();
        return response()->json($prescriptions);
    }

    public function createPrescription(Request $request)
    {
        try {
            $full_name = $request->input('full_name');
            $email = $request->input('email');

            $user = User::where('email', $email)
                ->where('status', '!=', UserStatus::DELETED)
                ->first();

            if (!$user){
                return response((new MainApi())->returnMessage('User not found!'), 400);
            }

            $user_id = $user->id;

            $created_by = $request->input('created_by');

            $prescriptions = $request->input('prescriptions');

            $notes = $request->input('notes');
            $notes_en = $request->input('notes_en') ?? $notes;
            $notes_laos = $request->input('notes_laos') ?? $notes;

            $status = $request->input('status') ?? PrescriptionResultStatus::ACTIVE;

            $prescription_result = new PrescriptionResults();

            $prescription_result->full_name = $full_name;
            $prescription_result->email = $email;
            $prescription_result->user_id = $user_id;

            $prescription_result->created_by = $created_by;

            $prescription_result->prescriptions = $prescriptions;

            $prescription_result->notes = $notes;
            $prescription_result->notes_en = $notes_en;
            $prescription_result->notes_laos = $notes_laos;

            $prescription_result->status = $status;

            $success = $prescription_result->save();

            if ($success) {
                return response()->json($prescription_result);
            }
            return response((new MainApi())->returnMessage('Error, Create error!'), 400);
        } catch (\Exception $exception) {
            dd($exception);
            return response((new MainApi())->returnMessage('Error, Please try again!'), 400);
        }
    }
}
