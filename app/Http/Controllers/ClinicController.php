<?php

namespace App\Http\Controllers;

use App\Enums\BookingStatus;
use App\Enums\ClinicStatus;
use App\Enums\DepartmentStatus;
use App\Enums\ServiceClinicStatus;
use App\Enums\SymptomStatus;
use App\Enums\TypeUser;
use App\Models\Booking;
use App\Models\Clinic;
use App\Models\Department;
use App\Models\ServiceClinic;
use App\Models\Symptom;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClinicController extends Controller
{
    public function show($id)
    {
        $clinics = Clinic::find($id);
        if (!$clinics || $clinics->status != ClinicStatus::ACTIVE) {
            return response("Product not found", 404);
        }
        return response()->json($clinics, $id);
    }


    public function showNear()
    {

    }

    public function index()
    {
        return view('clinics.listClinics');
    }

    public function detail($id)
    {
        $bookings = Clinic::find($id);
        if (Auth::check()) {
            $userId = Auth::user()->id;
            if (!$bookings || $bookings->status != ClinicStatus::ACTIVE) {
                return response("Product not found", 404);
            }
            if ($userId) {
                $memberFamily = \DB::table('family_management')
                    ->where('user_id', Auth::user()->id)
                    ->get();
                $services = ServiceClinic::where('status', ServiceClinicStatus::ACTIVE)->get();
                return view('clinics.detailClinics', compact('id', 'bookings', 'services', 'memberFamily', 'userId'));
            }
        }
        if (!$bookings || $bookings->status != ClinicStatus::ACTIVE) {
            return response("Product not found", 404);
        }

        $services = ServiceClinic::where('status', ServiceClinicStatus::ACTIVE)->get();
        return view('clinics.detailClinics', compact('id', 'bookings', 'services'));
    }

    public function create()
    {
        $departments = Department::where('status', DepartmentStatus::ACTIVE)->get();
        $symptoms = Symptom::where('status', SymptomStatus::ACTIVE)->get();
        $services = ServiceClinic::where('status', ServiceClinicStatus::ACTIVE)->get();
        $doctorLists = User::where('member', TypeUser::DOCTORS)->get();
        return view('admin.clinic.tab-create-clinics', compact('services', 'departments', 'symptoms', 'doctorLists'));
    }

    public function edit($id)
    {
        $clinic = Clinic::find($id);
        $reflector = new \ReflectionClass('App\Enums\TypeTimeWork');
        $types = $reflector->getConstants();
        $services = ServiceClinic::where('status', ServiceClinicStatus::ACTIVE)->get();
        $departments = Department::where('status', DepartmentStatus::ACTIVE)->get();
        $symptoms = Symptom::where('status', SymptomStatus::ACTIVE)->get();
        $doctorLists = User::where('member', TypeUser::DOCTORS)->get();
        return view('admin.clinic.tab-edit-clinics', compact('clinic', 'types', 'services', 'departments', 'symptoms', 'doctorLists'));
    }

    public function booking($id)
    {
        $bookings = Clinic::find($id);
        if (!$bookings || $bookings->status != ClinicStatus::ACTIVE) {
            return response("Product not found", 404);
        }
        return view('component.tab-booking.tab-booking', compact('id', 'bookings'));
    }

    public function bookingService($id)
    {
        $bookingSv = Clinic::find($id);
        if (!$bookingSv || $bookingSv->status != ClinicStatus::ACTIVE) {
            return response("Product not found", 404);
        }
        return view('component.tab-booking.booking-service', compact('id', 'bookingSv'));
    }

    public function selectDate($id)
    {
        $bookingSv = Clinic::find($id);
        if (!$bookingSv || $bookingSv->status != ClinicStatus::ACTIVE) {
            return response("Product not found", 404);
        }
        return view('component.tab-booking.select-date', compact('id', 'bookingSv'));
    }

    public function store(Request $request)
    {
        try {
            if (Auth::user() == null) {
                alert()->error('Error', 'Please login to booking.');
                return back();
            } else {
                $booking = new Booking();

                $booking = $this->createBooking($request, $booking);
                $success = $booking->save();

                if ($success) {
                    alert()->success('Success', 'Booking success.');
                    return back()->with('success', 'Booking success');
                }
            }
            alert()->error('Error', 'Booking error.');
            return back()->with('error', 'Booking error');
        } catch (\Exception $exception) {
            alert()->error('Error', 'Please try again');
            return back()->with('error', 'Booking error');
        }
    }

    public function createBooking(Request $request, $booking)
    {
        $userID = $request->input('user_id');
        $clinicID = $request->input('clinic_id');
        $checkOut = $request->input('check_out');
        $service = $request->input('service');
        $member = $request->input('member_family_id');
        if ($member == 0 || $member == null) {
            $memberFamily = Auth::user()->id;
        }
        else {
            $memberFamily = $member;
        }
        if (is_array($service)) {
            $servicesAsString = implode(',', $service);
        } else {
            $servicesAsString = $service;
        }
        $time = $request->input('selectedTime');
        $timestamp = Carbon::parse($time);

        $booking->user_id = $userID;
        $booking->clinic_id = $clinicID;
        $booking->check_in = $timestamp;
        $booking->status = BookingStatus::PENDING;
//        $booking->check_out = $checkOut;
        $booking->service = $servicesAsString;
        $booking->member_family_id = $memberFamily;

        return $booking;
    }
}
