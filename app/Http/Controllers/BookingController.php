<?php

namespace App\Http\Controllers;

use App\Enums\BookingStatus;
use App\Enums\ServiceClinicStatus;
use App\Models\Booking;
use App\Models\ServiceClinic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BookingController extends Controller
{

    public function index()
    {
        $id = Auth::user()->id;
        return view('bookings.listBooking',compact('id'));
    }
    public function edit($id)
    {
        $bookings_edit = Booking::find($id);
        $owner = $bookings_edit->clinic->user_id;
        $service = ServiceClinic::where('status', ServiceClinicStatus::ACTIVE)->get();
        $isAdmin = (new MainController())->checkAdmin();
        if ($owner == Auth::id() || $isAdmin) {
            return view('admin.booking.tab-edit-booking', compact('bookings_edit', 'isAdmin','service'));
        } else {
            return response()->json(['error' => 'You do not have permission.'], 403);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $booking = Booking::find($id);
            $userID = $request->input('user_id');
            $clinicID = $request->input('clinic_id');
            $checkIn = $request->input('check_in');
            $checkOut = $request->input('check_out');
            $servicesArray = $request->input('services');
            $status = $request->input('status');
            if (is_array($servicesArray)) {
                $servicesAsString = implode(',', $servicesArray);
            } else {
                $servicesAsString = $servicesArray;
            }
            $time = $request->input('selectedTime');

            $booking->user_id = $userID;
            $booking->clinic_id = $clinicID;
            $booking->check_in = $checkIn;
            $booking->check_out = $checkOut;
            $booking->service = $servicesAsString;
            $booking->status = $status;

            $success = $booking->save();
            if ($success) {
                alert('Booking success');
                return Redirect::route('homeAdmin.list.booking')->with('success', 'Booking success');
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

            $setting->status = BookingStatus::DELETE;
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
