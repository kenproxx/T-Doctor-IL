<?php

namespace App\Http\Controllers\restapi;

use App\Enums\BookingStatus;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Clinic;
use App\Models\User;
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
            $familyId = $booking->member_family_id;
            $exitBooking = Booking::where('clinic_id', $clinicID)
                ->where('service', $servicesAsString)
                ->where('member_family_id', $familyId)
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

    public function detail($id)
    {
        $booking = Booking::find($id);
        if (!$booking || $booking->status == BookingStatus::DELETE) {
            return response('Not found!', 404);
        }
        return response()->json($booking);
    }

    public function getAllBookingByUserId($id, $status,  Request $request)
    {
        $user = User::find($id);

        if ($user) {
            $roleNames = $user->roles->pluck('name')->toArray();

            $desiredRoles = ['CLINICS', 'HOSPITALS'];

            $intersection = array_intersect($roleNames, $desiredRoles);

            if (!empty($intersection)) {
                $myData  = Clinic::where('user_id', $id)->get();

                if ($myData->isNotEmpty()) {
                    $clinicIds = $myData->pluck('id')->toArray();

                    $otherClinics = Booking::whereIn('clinic_id', $clinicIds)->get();

                    foreach ($otherClinics as $clinic) {
                        $arrayBooking = null;
                        $arrayBooking = $clinic->toArray();
                        $arrayBooking['time_convert_checkin'] = date('Y-m-d H:i:s', strtotime($clinic->check_in));
                        $arrayBookings[] = $arrayBooking;
                    }
                }

            } else {
                $bookings = Booking::where('user_id', $id)
                    ->where('status', $status)
                    ->get();
                $arrayBookings = null;

                foreach ($bookings as $booking) {
                    $arrayBooking = null;
                    $arrayBooking = $booking->toArray();
                    $arrayBooking['time_convert_checkin'] = date('Y-m-d H:i:s', strtotime($booking->check_in));
                    $arrayBookings[] = $arrayBooking;
                }
            }
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

    public function cancelBooking(Request $request, $id)
    {
        if ($id) {
            $booking = Booking::find($id);
            if ($booking) {
                if ($booking->status == BookingStatus::CANCEL) {
                    $booking->status = BookingStatus::PENDING;
                } else {
                    $booking->status = BookingStatus::CANCEL;
                }

                $booking->save();
                return response()->json(['message' => 'Booking status updated successfully']);
            } else {
                return response()->json(['error' => 'Booking not found'], 404);
            }
        } else {
            return response()->json(['error' => 'Missing booking_id parameter'], 400);
        }
    }

    /**
     * @param $userId
     * @param $bookingId
     * @return \Illuminate\Http\JsonResponse
     */
    public function bookingCancel ($userId, $bookingId, $status) {
        if ($userId) {
            $booking = Booking::where([
                'id' => $bookingId,
                'user_id' => $userId
            ])->first();
            if ($booking) {

                $booking->status = $status;
                $booking->save();

                return response()->json(['message' => 'Cancellation of booking successfully'], 200);
            } else {
                return response()->json(['error' => 'Booking not found'], 414);
            }
        } else {
            return response()->json(['error' => 'Missing user id parameter'], 400);
        }
    }

    public function getAllBooking()
    {
        $arrayBookings = Booking::all();

        return response()->json($arrayBookings);
    }
}
