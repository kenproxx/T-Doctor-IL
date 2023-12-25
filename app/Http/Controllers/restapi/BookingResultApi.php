<?php

namespace App\Http\Controllers\restapi;

use App\Enums\BookingResultStatus;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingResult;
use App\Models\Clinic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingResultApi extends Controller
{
    public function getListByUser(Request $request)
    {
        $user_id = $request->input('user_id');
        $results = DB::table('booking_results')
            ->where('user_id', $user_id)
            ->where('status', '!=', BookingResultStatus::DELETED)
            ->select('booking_results.*')
            ->cursor()
            ->map(function ($item) {
                $result = (array)$item;
                $booking = Booking::find($item->booking_id);
                $clinic = Clinic::find($booking->clinic_id);
                $result['clinics'] = $clinic->toArray();
                $value = Carbon::parse($booking->created_at);
                $appointment_date = $value->addHours(7)->format('Y-m-d H:i:s');
                $result['appointment_date'] = $appointment_date;
                $value = Carbon::parse($item->created_at);
                $results_date = $value->addHours(7)->format('Y-m-d H:i:s');
                $result['results_date'] = $results_date;
                return $result;
            });

        return response()->json($results);
    }

    public function getListByBusinessID(Request $request)
    {
        $business_id = $request->input('business_id');

        $books = Booking::where('clinic_id', $business_id)->get();
        if (count($books) < 1) {
            return response((new MainApi())->returnMessage('Booking Empty'), 200);
        }

        $array = null;
        foreach ($books as $item) {
            $array[] = $item->id;
        }

        $user_id = $request->input('user_id');
        $results = BookingResult::where('status', BookingResultStatus::ACTIVE)
            ->whereIn('booking_id', $array)
            ->where('user_id', $user_id)
            ->orderBy('id', 'desc')
            ->get();
        return response()->json($results);
    }

    public function detail($id)
    {
        $result = BookingResult::find($id);
        if (!$result || $result->status == BookingResultStatus::DELETED) {
            return response((new MainApi())->returnMessage('Not found'), 404);
        }
        return response()->json($result);
    }

    public function delete($id)
    {
        try {
            $result = BookingResult::find($id);
            if (!$result || $result->status == BookingResultStatus::DELETED) {
                return response((new MainApi())->returnMessage('Not found'), 404);
            }
            $result->status = BookingResultStatus::DELETED;
            $success = $result->save();
            if ($success) {
                return response((new MainApi())->returnMessage('Delete success!'), 200);
            }
            return response((new MainApi())->returnMessage('Delete error!'), 400);
        } catch (\Exception $exception) {
            return response((new MainApi())->returnMessage('Error, Please try again!'), 400);
        }
    }
}
