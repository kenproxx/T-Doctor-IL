<?php

namespace App\Http\Controllers\restapi\admin;

use App\Enums\BookingStatus;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingApi extends Controller
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

    public function updateStatus(Request $request, $id)
    {
        try {
            $booking = Booking::find($id);
            if (!$booking || $booking->status == BookingStatus::DELETE) {
                return response('Not found!', 404);
            }
            $status = $request->input('status');
            if (!$status) {
                $status = BookingStatus::APPROVED;
            }
            $booking->status = $status;
            $success = $booking->save();
            if ($success) {
                return response()->json($booking);
            }
            return response('Error, Please try again!', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

    public function delete($id)
    {
        try {
            $booking = Booking::find($id);
            if (!$booking || $booking->status == BookingStatus::DELETE) {
                return response('Not found!', 404);
            }

            $booking->status = BookingStatus::DELETE;
            $success = $booking->save();
            if ($success) {
                return response()->json($booking);
            }
            return response('Error, Delete error!', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }
}
