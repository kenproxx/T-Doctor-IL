<?php

namespace App\Http\Controllers\ui;

use App\Enums\BookingStatus;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyBookingController extends Controller
{
    public function listBooking(Request $request)
    {
        $bookings = Booking::where('status', '!=', BookingStatus::DELETE)
            ->where('user_id', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->paginate(20);
        return view('ui.my-bookings.list-booking', compact('bookings'));
    }

    public function detailBooking(Request $request, $id)
    {
        $booking = Booking::find($id);
        return view('ui.my-bookings.detail-booking', compact('booking'));
    }

    public function bookingResult(Request $request, $id)
    {
        return view('ui.my-bookings.result');
    }

    public function listProductResult(Request $request, $id)
    {
        return view('ui.my-bookings.list-products');
    }
}
