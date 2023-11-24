<?php

namespace App\Http\Controllers\restapi\admin;

use App\Enums\BookingStatus;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function getAll(Request $request)
    {
        $status = $request->input('status');
        if ($status) {
            $bookings = Booking::where('status', $status)
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $bookings = Booking::where('status', '!=', BookingStatus::CANCEL)
                ->orderBy('id', 'desc')
                ->get();
        }
        return response()->json($bookings);
    }

    public function getAllByClinicId($id, Request $request)
    {
        $status = $request->input('status');
        if ($status) {
            $bookings = Booking::where('status', $status)
                ->where('clinic_id', $id)
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $bookings = Booking::where('status', '!=', BookingStatus::CANCEL)
                ->where('clinic_id', $id)
                ->orderBy('id', 'desc')
                ->get();
        }
        return response()->json($bookings);
    }

    public function getAllByUserId($id, Request $request)
    {
        $status = $request->input('status');
        if ($status) {
            $bookings = Booking::where('status', $status)
                ->where('user_id', $id)
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $bookings = Booking::where('status', '!=', BookingStatus::DELETE)
                ->where('user_id', $id)
                ->orderBy('id', 'desc')
                ->get();
        }
        return response()->json($bookings);
    }

    public function detail($id)
    {
        $booking = Booking::find($id);
        if (!$booking || $booking->status == BookingStatus::DELETE) {
            return response('Not found!', 404);
        }
        return response()->json($booking);
    }

    public function
}
