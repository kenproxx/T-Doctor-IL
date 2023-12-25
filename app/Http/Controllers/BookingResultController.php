<?php

namespace App\Http\Controllers;

use App\Enums\BookingResultStatus;
use App\Models\BookingResult;
use Illuminate\Support\Facades\Auth;

class BookingResultController extends Controller
{
    public function getList()
    {
        $isAdmin = (new MainController())->checkAdmin();
        if ($isAdmin) {
            $results = BookingResult::where('status', '!=', BookingResultStatus::DELETED)
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $results = BookingResult::where('status', '!=', BookingResultStatus::DELETED)
                ->orderBy('id', 'desc')
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
        return view('admin.booking.detail-booking-result', compact('result'));
    }
}
