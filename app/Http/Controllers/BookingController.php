<?php

namespace App\Http\Controllers;

use App\Enums\BookingStatus;
use App\Enums\ServiceClinicStatus;
use App\Models\Booking;
use App\Models\Clinic;
use App\Models\ServiceClinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BookingController extends Controller
{

    public function index()
    {
        $id = Auth::user()->id;
        return view('bookings.listBooking', compact('id'));
    }

    public function detailBooking($id)
    {
        $booking = Booking::find($id);
        $clinic = Clinic::find($booking->clinic_id);
        $user = Auth::user();
        if ($booking->member_family_id == null) {
            $memberFamily = null;
        } else {
            $memberFamily = \DB::table('family_management')
                ->where('user_id', $booking->user_id)
                ->where('id', $booking->member_family_id)->get();
        }
        $serviceBookings = explode(',', $booking->service);
        $service = ServiceClinic::whereIn('id', $serviceBookings)->get();
        $isAdmin = (new MainController())->checkAdmin();
        return view('bookings.detailBooking', compact('booking', 'clinic', 'user', 'memberFamily', 'service', 'isAdmin'));
    }

    public function edit($id)
    {
        $bookings_edit = Booking::find($id);
        $owner = $bookings_edit->clinic->user_id;
        $serviceID = $bookings_edit->service;
        $arrayService = explode(',', $serviceID);
        $services = ServiceClinic::where('status', ServiceClinicStatus::ACTIVE)->get();
        $isAdmin = (new MainController())->checkAdmin();

        if ($owner == Auth::id() || $isAdmin) {
            return view('admin.booking.tab-edit-booking', compact('bookings_edit', 'isAdmin', 'services'));
        } else {
            session()->flash('error', 'You do not have permission.');
            return \redirect()->back();
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $booking = Booking::find($id);
            $checkIn = $request->input('check_in');
            $checkOut = $request->input('check_out');
            $servicesArray = $request->input('services');
            $status = $request->input('status');
            if (is_array($servicesArray)) {
                $servicesAsString = implode(',', $servicesArray);
            } else {
                $servicesAsString = $servicesArray;
            }
            $is_result = $request->input('is_result');
            if (!$is_result) {
                $is_result = 0;
            }

            $booking->is_result = $is_result;
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
            $booking = Booking::find($id);
            if (!$booking || $booking->status == BookingStatus::DELETE) {
                return back();
            }

            if ($booking->status == BookingStatus::COMPLETE) {
                alert()->error('Không thể xóa khi đã hoàn thành!');
                return back();
            }

            $booking->status = BookingStatus::DELETE;
            $success = $booking->save();
            if ($success) {
                alert()->success('Delete success!');
                return back();
            }
            return response('Delete error!', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }
}
