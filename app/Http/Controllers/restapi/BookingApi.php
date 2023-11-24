<?php

namespace App\Http\Controllers\restapi;

use App\Enums\BookingStatus;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingApi extends Controller
{
    public function createBooking(Request $request)
    {
        try {
            $booking = new Booking();
            $booking = (new ClinicController())->createBooking($request, $booking);

            $clinicID = $booking->clinic_id;
            $servicesAsString = $booking->service;
            $timestamp = $booking->check_in;
            $datetime = $timestamp->addMinutes(30);
            $exitBooking = Booking::where('clinic_id', $clinicID)
                ->where('service', $servicesAsString)
                ->where('check_in', '<', $datetime)
                ->where('status', BookingStatus::APPROVED)
                ->get();
            if (count($exitBooking) > 5) {
                $array = [
                    'message' => 'The pre-booking service has reached the allowed number! Please re-choose again!'
                ];
                return response($array, 400);
            }

            $success = $booking->save();
            if ($success) {
                $response = $booking->toArray();
                $response['time_convert_checkin'] = date('Y-m-d H:i:s', strtotime($booking->check_in));
                return response()->json($response);
            }
            return response('Create error', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

    public function getAllBookingByUserId($id, Request $request)
    {
        $status = $request->input('status');
        if ($status) {
            $bookings = Booking::where('user_id', $id)
                ->where('status', $status)
                ->get();
        } else {
            $bookings = Booking::where('user_id', $id)
                ->where('status', '!=', BookingStatus::CANCEL)
                ->get();
        }
        $arrayBookings = null;
        foreach ($bookings as $booking) {
            $arrayBooking = null;
            $arrayBooking = $booking->toArray();
            $arrayBooking['time_convert_checkin'] = date('Y-m-d H:i:s', strtotime($booking->check_in));
            $arrayBookings[] = $arrayBooking;
        }
        return response()->json($arrayBookings);
    }

    public function getAllBookingByClinicID($id, Request $request)
    {
        $status = $request->input('status');
        if ($status) {
            $bookings = Booking::where('clinic_id', $id)
                ->where('status', $status)
                ->get();
        } else {
            $bookings = Booking::where('clinic_id', $id)
                ->where('status', '!=', BookingStatus::CANCEL)
                ->get();
        }
        $arrayBookings = null;
        foreach ($bookings as $booking) {
            $arrayBooking = null;
            $arrayBooking = $booking->toArray();
            $arrayBooking['time_convert_checkin'] = date('Y-m-d H:i:s', strtotime($booking->check_in));
            $arrayBookings[] = $arrayBooking;
        }
        return response()->json($arrayBookings);
    }
}
