<?php

namespace App\Http\Controllers;

use App\Enums\BookingStatus;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function edit($id)
    {
        $bookings_edit = Booking::find($id);
        $isAdmin = (new MainController())->checkAdmin();
        return view('admin.booking.tab-edit-booking', compact('bookings_edit', 'isAdmin'));
    }

    public function update(Request $request, $id)
    {
        try {
            $booking = Booking::find($id);
            $userID = $request->input('user_id');
            $clinicID = $request->input('clinic_id');
            $checkIn = $request->input('check_in');
            $checkOut = $request->input('check_out');
            $service = $request->input('service');
            $status = $request->input('status');
            if (is_array($service)) {
                $servicesAsString = implode(',', $service);
            } else {
                $servicesAsString = $service;
            }
            $time = $request->input('selectedTime');
            $timestamp = Carbon::parse($time);

            $booking->user_id = $userID;
            $booking->clinic_id = $clinicID;
            $booking->check_in = $checkIn;
            $booking->check_out = $checkOut;
            $booking->service = $servicesAsString;
            $booking->status = $status;

            $success = $booking->save();
            if ($success) {
                alert('Booking success');
                return back()->with('success', 'Booking success');
            }
            return response('Create error', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

    public function delete($id)
    {
        try {
            $setting = Booking::find($id);
            if (!$setting || $setting->status == BookingStatus::CANCEL) {
                return response('Not found', 404);
            }

            $setting->status = BookingStatus::CANCEL;
            $success = $setting->save();
            if ($success) {
                alert()->success('Delete success!');
                return back();
            }
            return response(');Delete error!', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }
}
