<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Enums\ClinicStatus;
use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    public function show($id)
    {
        $clinics = Clinic::find($id);
        if (!$clinics || $clinics->status != ClinicStatus::ACTIVE) {
            return response("Product not found", 404);
        }
        return response()->json($clinics,$id);
    }

    public function index()
    {
        return view('clinics.listClinics');
    }

    public function detail($id)
    {
        $bookings = Clinic::find($id);
        if (!$bookings || $bookings->status != ClinicStatus::ACTIVE) {
            return response("Product not found", 404);
        }
        return view('clinics.detailClinics',compact('id','bookings'));
    }

    public function create()
    {
        return view('admin.clinic.tab-create-clinics');
    }

    public function edit($id)
    {
        $clinics = Clinic::find($id);
        if (!$clinics || $clinics->status != ClinicStatus::ACTIVE) {
            return response("Product not found", 404);
        }
        return view('admin.clinic.tab-edit-clinics',compact('clinics'));
    }

    public function booking($id)
    {
        $bookings = Clinic::find($id);
        if (!$bookings || $bookings->status != ClinicStatus::ACTIVE) {
            return response("Product not found", 404);
        }
        return view('component.tab-booking.tab-booking',compact('id','bookings'));
    }
    public function bookingService($id)
    {
        $bookingSv = Clinic::find($id);
        if (!$bookingSv || $bookingSv->status != ClinicStatus::ACTIVE) {
            return response("Product not found", 404);
        }
        return view('component.tab-booking.booking-service',compact('id','bookingSv'));
    }
    public function selectDate($id)
    {
        $bookingSv = Clinic::find($id);
        if (!$bookingSv || $bookingSv->status != ClinicStatus::ACTIVE) {
            return response("Product not found", 404);
        }
        return view('component.tab-booking.select-date',compact('id','bookingSv'));
    }

    public function store(Request $request)
    {
        try {
            $userID = $request->input('user_id');
            $clinicID = $request->input('clinic_id');
            $checkIn = $request->input('check_in');
            $checkOut = $request->input('check_out');
            $service = $request->input('service');
            $servicesAsString = implode(',', $service);
            $time = $request->input('selectedTime');
            dd($request->all());
            $booking = new Booking();

            $booking->user_id = $userID;
            $booking->clinic_id = $clinicID;
            $booking->check_in = $time;
            $booking->check_out = $checkOut;
            $booking->service = $servicesAsString;

            $success = $booking->save();
            if ($success) {
                \Laravel\Prompts\alert('Booking success');
                return back()->with('success', 'Booking success');
            }
            return response('Create error', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }
}
