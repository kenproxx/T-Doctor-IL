<?php

namespace App\Http\Controllers;

use App\Enums\BookingResultStatus;
use App\Enums\ServiceClinicStatus;
use App\Models\BookingResult;
use App\Models\ServiceClinic;
use Illuminate\Support\Facades\Auth;

class BookingResultController extends Controller
{
    public function getList($id)
    {
        $isAdmin = (new MainController())->checkAdmin();
        if ($isAdmin) {
            $results = BookingResult::where('status', '!=', BookingResultStatus::DELETED)
                ->orderBy('id', 'desc')
                ->where('booking_id', $id)
                ->get();
        } else {
            $results = BookingResult::where('status', '!=', BookingResultStatus::DELETED)
                ->orderBy('id', 'desc')
                ->where('booking_id', $id)
                ->where('user_id', Auth::user()->id)
                ->get();
        }
        return view('admin.booking.list-result', compact('results'));
    }

    public function detail($id)
    {
        $result = BookingResult::find($id);
        if (!$result || $result->status == BookingResultStatus::DELETED) {
            return back();
        }
        $services = ServiceClinic::where('status', ServiceClinicStatus::ACTIVE)->get();
        return view('admin.booking.detail-booking-result', compact('result', 'services'));
    }
}
