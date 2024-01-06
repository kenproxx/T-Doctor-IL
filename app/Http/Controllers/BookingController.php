<?php

namespace App\Http\Controllers;

use App\Enums\BookingStatus;
use App\Enums\ServiceClinicStatus;
use App\Enums\SurveyType;
use App\Models\Booking;
use App\Models\BookingResult;
use App\Models\Clinic;
use App\Models\MedicalFavourite;
use App\Models\ServiceClinic;
use App\Models\SurveyAnswer;
use App\Models\SurveyAnswerUser;
use App\Models\SurveyQuestion;
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

    public function resultsDetail($id)
    {
        $resultBooking = BookingResult::where('booking_id', $id)->first();
        $medical_favourites = MedicalFavourite::where('is_favorite', 1);
        if (Auth::check()) {
            $medical_favourites = MedicalFavourite::where('user_id', Auth::user()->id)->where('is_favorite', 1);
        }
        $medical_favourites = json_encode($medical_favourites->pluck('medical_id')->toArray());
        return view('bookings.resultBooking', compact('resultBooking', 'medical_favourites'));
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

        $surveyByBooking = SurveyAnswerUser::where([['booking_id', $id], ['user_id', Auth::id()]])->get('result');

        $arraySurvey = [];
        foreach ($surveyByBooking as $survey) {
            $parts = explode('-', $survey->result, 2);
            $idQuestion = $parts[0];

            $question = SurveyQuestion::find($idQuestion)->toArray();

            if ($question['type'] === SurveyType::TEXT) {
                $question['answers'] = $parts[1];
                array_push($arraySurvey, $question);
                continue;
            }

            $idAnswer = $parts[1];
            $idAnswer = explode(',', $idAnswer);
            $answers = SurveyAnswer::whereIn('id', $idAnswer)->get()->toArray();
            $question['answers'] = $answers;

            array_push($arraySurvey, $question);
        }

        return view('bookings.detailBooking', compact('booking', 'clinic', 'user', 'memberFamily', 'service', 'isAdmin', 'arraySurvey'));
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
