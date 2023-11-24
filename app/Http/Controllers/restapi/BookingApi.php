<?php

namespace App\Http\Controllers\restapi;

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
            $success = $booking->save();
            if ($success) {
                return response()->json($booking);
            }
            return response('Create error', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }
}
