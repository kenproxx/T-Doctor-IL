<?php

namespace App\Http\Controllers\restapi\admin;

use App\Enums\BookingResultStatus;
use App\Enums\BookingStatus;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Http\Controllers\restapi\MainApi;
use App\Models\Booking;
use App\Models\BookingResult;
use Illuminate\Http\Request;

class AdminBookingResultApi extends Controller
{
    public function getAll(Request $request)
    {
        $results = BookingResult::where('status', '!=', BookingResultStatus::DELETED)->get();
        return response()->json($results);
    }

    public function getAllByBusiness(Request $request)
    {
        $business_id = $request->input('business_id');

        $books = Booking::where('clinic_id', $business_id)
            ->where('is_result', 1)
            ->where('status', '=', BookingStatus::APPROVED)
            ->get();
        if (count($books) < 1) {
            return response((new MainApi())->returnMessage('Booking Empty'), 200);
        }

        $array = null;
        foreach ($books as $item) {
            $array[] = $item->id;
        }

        $results = BookingResult::where('status', BookingResultStatus::ACTIVE)
            ->whereIn('booking_id', $array)
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

    public function create(Request $request)
    {
        try {
            $result = new BookingResult();

            $result = $this->store($request, $result);
            $success = $result->save();
            if ($success) {
                return response()->json($result);
            }
            return response((new MainApi())->returnMessage('Create error!'), 400);
        } catch (\Exception $exception) {
            dd($exception);
            return response((new MainApi())->returnMessage('Error, Please try again!'), 400);
        }
    }

    private function store($request, $result)
    {
        $service_name = $request->input('service_result');

        $code = 'BR' . (new MainController())->generateRandomString(8);

        $result_input = $request->input('result');
        $result_input_en = $request->input('result_en');
        $result_input_laos = $request->input('result_laos');

        $booking_id = $request->input('booking_id');

        $detail = $request->input('detail');
        $detail_en = $request->input('detail_en');
        $detail_laos = $request->input('detail_laos');

        $user_id = $request->input('user_id');
        $created_by = $request->input('created_by');
        $status = BookingResultStatus::ACTIVE;

        if ($request->hasFile('files')) {
            $galleryPaths = array_map(function ($image) {
                $itemPath = $image->store('result', 'public');
                return asset('storage/' . $itemPath);
            }, $request->file('files'));
            $files = implode(',', $galleryPaths);
        } else {
            $files = $result->files;
        }

        $result->service_name = $service_name;

        $result->code = $code;

        $result->result = $result_input;
        $result->result_en = $result_input_en;
        $result->result_laos = $result_input_laos;

        $result->booking_id = $booking_id;

        $result->detail = $detail;
        $result->detail_en = $detail_en;
        $result->detail_laos = $detail_laos;

        $result->user_id = $user_id;
        $result->created_by = $created_by;

        $result->files = $files;

        $result->status = $status;
        return $result;
    }

    public function update(Request $request, $id)
    {
        try {
            $result = BookingResult::find($id);
            if (!$result || $result->status == BookingResultStatus::DELETED) {
                return response((new MainApi())->returnMessage('Not found'), 404);
            }

            $result = $this->store($request, $result);
            $success = $result->save();
            if ($success) {
                return response()->json($result);
            }
            return response((new MainApi())->returnMessage('Update error!'), 400);
        } catch (\Exception $exception) {
            return response((new MainApi())->returnMessage('Error, Please try again!'), 400);
        }
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
