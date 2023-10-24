<?php

namespace App\Http\Controllers\backend;

use App\Enums\ClinicStatus;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BackendClinicController extends Controller
{
    public function getAll(Request $request)
    {
        $status = $request->input('status');
        if ($status && $status != ClinicStatus::DELETED) {
            $clinics = Clinic::where('status', $status)->get();
        } else {
            $clinics = Clinic::where('status', '!=', ClinicStatus::DELETED)->get();
        }
        return response()->json($clinics);
    }

    public function getAllByUserId(Request $request, $id)
    {
        $status = $request->input('status');
        if ($status && $status != ClinicStatus::DELETED) {
            $clinics = Clinic::where([
                ['status', $status],
                ['user_id', $id]
            ])->get();
        } else {
            $clinics = Clinic::where([
                ['status', '!=', ClinicStatus::DELETED],
                ['user_id', $id]
            ])->get();
        }
        return response()->json($clinics);
    }

    public function create(Request $request)
    {
        try {
            $clinic = new Clinic();

            $name = $request->input('name');
            $name_en = $request->input('name_en');
            $name_laos = $request->input('name_laos');
            $address_detail = $request->input('address_detail');
            $address_detail_en = $request->input('address_detail_en');
            $user_id = $request->input('user_id');
            $nation_id = $request->input('nation_id');
            $province_id = $request->input('province_id');
            $district_id = $request->input('district_id');
            $commune_id = $request->input('commune_id');
            $open_date = $request->input('open_date');
            $close_date = $request->input('close_date');
            $introduce = $request->input('introduce');
            $gallery = $request->input('gallery');
            $status = $request->input('status');

            $clinic->name = $name;
            $clinic->name_en = $name_en ?? '';
            $clinic->name_laos = $name_laos ?? '';
            $clinic->address_detail = $address_detail;
            $clinic->address_detail_en = $address_detail_en ?? '';
            $clinic->user_id = $user_id;

            $address = [
                'nation_id' => $nation_id,
                'province_id' => $province_id,
                'district_id' => $district_id,
                'commune_id' => $commune_id
            ];

            $clinic->address = implode(',', $address);

            $clinic->open_date = $open_date ?? Carbon::now()->addHours(7);
            $clinic->close_date = $close_date ?? Carbon::now()->addHours(7)->addDay();
            $clinic->introduce = $introduce;
            $clinic->gallery = $gallery;
            $clinic->status = $status ?? ClinicStatus::ACTIVE;

            if (!$user_id) {
                return response("UserID not null!", 400);
            } else {
                $user = User::find($user_id);
                if (!$user || $user->status == UserStatus::DELETED || $user->status == UserStatus::BLOCKED) {
                    return response("User not found!", 400);
                }
            }

            $success = $clinic->save();
            if ($success) {
                return response()->json($clinic);
            }
            return response("Error, Please try again!", 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

    public function detail($id)
    {
        $clinic = Clinic::find($id);
        if (!$clinic || $clinic->status == ClinicStatus::DELETED) {
            return response("Clinic not found", 404);
        }
        return response()->json($clinic);
    }

    public function update($id, Request $request)
    {
        try {
            $clinic = Clinic::find($id);
            if (!$clinic || $clinic->status == ClinicStatus::DELETED) {
                return response("Clinic not found", 404);
            }

            $name = $request->input('name') ?? $clinic->name;
            $name_en = $request->input('name_en') ?? $clinic->name_en;
            $name_laos = $request->input('name_laos') ?? $clinic->name_en;
            $address_detail = $request->input('address_detail') ?? $clinic->address_detail;
            $address_detail_en = $request->input('address_detail_en') ?? $clinic->address_detail_en;
            $nation_id = $request->input('nation_id');
            $province_id = $request->input('province_id');
            $district_id = $request->input('district_id');
            $commune_id = $request->input('commune_id');
            $open_date = $request->input('open_date') ?? $clinic->open_date;
            $close_date = $request->input('close_date') ?? $clinic->close_date;
            $introduce = $request->input('introduce') ?? $clinic->introduce;
            $gallery = $request->input('gallery') ?? $clinic->gallery;
            $status = $request->input('status') ?? $clinic->status;

            $clinic->name = $name;
            $clinic->name_en = $name_en ?? '';
            $clinic->name_laos = $name_laos ?? '';
            $clinic->address_detail = $address_detail;
            $clinic->address_detail_en = $address_detail_en ?? '';

            $address = [
                'nation_id' => $nation_id,
                'province_id' => $province_id,
                'district_id' => $district_id,
                'commune_id' => $commune_id
            ];

            $clinic->address = implode(',', $address);

            $clinic->open_date = $open_date ?? Carbon::now()->addHours(7);
            $clinic->close_date = $close_date ?? Carbon::now()->addHours(7)->addDay();
            $clinic->introduce = $introduce;
            $clinic->gallery = $gallery;
            $clinic->status = $status ?? ClinicStatus::ACTIVE;

            $success = $clinic->save();
            if ($success) {
                return response()->json($clinic);
            }
            return response("Error, Please try again!", 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

    public function delete($id)
    {
        try {
            $clinic = Clinic::find($id);
            if (!$clinic || $clinic->status == ClinicStatus::DELETED) {
                return response("Clinic not found", 404);
            }
            $clinic->status = ClinicStatus::DELETED;
            $success = $clinic->save();
            if ($success) {
                return response("Delete success!", 200);
            }
            return response("Error, Please try again!", 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }
}
