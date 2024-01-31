<?php

namespace App\Http\Controllers\restapi\admin;

use App\Enums\BookingStatus;
use App\Http\Controllers\Controller;
use App\Http\Controllers\restapi\MainApi;
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
            $bookings = Booking::where('status', '!=', BookingStatus::DELETE)
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
                return response((new MainApi())->returnMessage('Booking not found'), 404);
            }
            $status = $request->input('status') ?? BookingStatus::CANCEL;
            $reason = $request->input('reason');

            $booking->status = $status;
            $booking->reason_cancel = $reason;
            $booking->save();
            return response((new MainApi())->returnMessage( 'Booking status updated successfully'), 200);

        } catch (\Exception $exception) {
            return response((new MainApi())->returnMessage('Error, Please try again!'), 400);
        }
    }

    public function delete($id)
    {
        try {
            $booking = Booking::find($id);
            if (!$booking || $booking->status == BookingStatus::DELETE) {
                return response('Not found!', 404);
            }

            if ($booking->status == BookingStatus::COMPLETE) {
                return response('Không thể xóa khi đã hoàn thành!', 400);
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

    public function getAllByDoctorID($id, Request $request)
    {
        $status = $request->input('status');
        if ($status) {
            $bookings = Booking::where('status', $status)
                ->where('doctor_id', $id)
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $bookings = Booking::where('status', '!=', BookingStatus::DELETE)
                ->where('doctor_id', $id)
                ->orderBy('id', 'desc')
                ->get();
        }
        return response()->json($bookings);
    }
}
