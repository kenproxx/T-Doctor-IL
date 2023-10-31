<?php

namespace App\Http\Controllers\restapi\admin;

use App\Enums\DoctorInfoStatus;
use App\Http\Controllers\Controller;
use App\Models\DoctorInfo;
use Illuminate\Http\Request;

class AdminDoctorInfoApi extends Controller
{
    public function getAll(Request $request)
    {
        $status = $request->input('status');
        if ($status) {
            $doctor_infos = DoctorInfo::where('status', $status)->get();
        } else {
            $doctor_infos = DoctorInfo::where('status', '!=', DoctorInfoStatus::DELETED)->get();
        }
        return response()->json($doctor_infos);
    }

    public function search(Request $request)
    {

    }

    public function findByUser($id)
    {
        $doctor_infos = DoctorInfo::where('created_by', $id)->first();
        if (!$doctor_infos || $doctor_infos->status == DoctorInfoStatus::DELETED) {
            return response('Not found', 404);
        }
        return response()->json($doctor_infos);
    }

    public function detail(Request $request, $id)
    {
        $doctor_infos = DoctorInfo::where('id', $id)->first();
        if (!$doctor_infos || $doctor_infos->status == DoctorInfoStatus::DELETED) {
            return response('Not found', 404);
        }
        return response()->json($doctor_infos);
    }

    public function create(Request $request)
    {
        try {
            $doctor_infos = new DoctorInfo();

            $item = $this->saveDoctorInfo($request, $doctor_infos);
            if ($item) {
                return response()->json($doctor_infos);
            }
            return response("Create error!", 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $doctor_infos = DoctorInfo::where('id', $id)->first();
            if (!$doctor_infos || $doctor_infos->status == DoctorInfoStatus::DELETED) {
                return response('Not found', 404);
            }

            $item = $this->saveDoctorInfo($request, $doctor_infos);
            if ($item) {
                return response()->json($doctor_infos);
            }
            return response("Update error!", 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

    public function delete($id)
    {
        try {
            $doctor_infos = DoctorInfo::where('id', $id)->first();
            if (!$doctor_infos || $doctor_infos->status == DoctorInfoStatus::DELETED) {
                return response('Not found', 404);
            }
            $doctor_infos->status = DoctorInfoStatus::DELETED;
            $success = $doctor_infos->save();
            if ($success) {
                return response('Delete success!', 200);
            }
            return response('Delete error!', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

    private function saveDoctorInfo($request, $doctor)
    {
        $name = $request->input('name');

        $specialty = $request->input('specialty');
        $specialty_en = $request->input('specialty_en');
        $specialty_laos = $request->input('specialty_laos');

        $year_of_experience = $request->input('year_of_experience');

        if ($request->hasFile('thumbnail')) {
            $item = $request->file('thumbnail');
            $itemPath = $item->store('doctor', 'public');
            $thumbnail = asset('storage/' . $itemPath);
        } else {
            if ($doctor->thumbnail) {
                $thumbnail = $doctor->thumbnail;
            } else {
                $thumbnail = '';
            }
        }

        $service = $request->input('service');
        $service_en = $request->input('service_en');
        $service_laos = $request->input('service_laos');

        $service_price = $request->input('service_price');
        $service_price_en = $request->input('service_price_en');
        $service_price_laos = $request->input('service_price_laos');

        $time_working_1 = $request->input('time_working_1');
        $time_working_2 = $request->input('time_working_2');

        $province_id = $request->input('province_id');
        $district_id = $request->input('district_id');
        $commune_id = $request->input('commune_id');

        $detail_address = $request->input('detail_address');
        $detail_address_en = $request->input('detail_address_en');
        $detail_address_laos = $request->input('detail_address_laos');
        $created_by = $request->input('created_by');

        $status = $request->input('status');

        $apply_for = $request->input('apply_for');

        $doctor->name = $name;

        $doctor->thumbnail = $thumbnail;

        $doctor->specialty = $specialty;
        $doctor->specialty_en = $specialty_en;
        $doctor->specialty_laos = $specialty_laos;

        $doctor->year_of_experience = $year_of_experience;

        $doctor->service = $service;
        $doctor->service_en = $service_en;
        $doctor->service_laos = $service_laos;

        $doctor->service_price = $service_price;
        $doctor->service_price_en = $service_price_en;
        $doctor->service_price_laos = $service_price_laos;

        $doctor->time_working_1 = $time_working_1;
        $doctor->time_working_2 = $time_working_2;

        $doctor->province_id = $province_id;
        $doctor->district_id = $district_id;
        $doctor->commune_id = $commune_id;

        $doctor->detail_address = $detail_address;
        $doctor->detail_address_en = $detail_address_en;
        $doctor->detail_address_laos = $detail_address_laos;

        $doctor->created_by = $created_by;

        $doctor->status = $status;
        $doctor->apply_for = $apply_for;

        return $doctor->save();
    }
}