<?php

namespace App\Http\Controllers\backend;

use App\Enums\ClinicStatus;
use App\Enums\TypeBusiness;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackendClinicController extends Controller
{
    public function getAll()
    {
        $clinics = Clinic::where('type', TypeBusiness::CLINICS)->get();
        return response()->json($clinics);
    }

    public function getAllPharmacies()
    {
        $clinics = Clinic::where('type', TypeBusiness::PHARMACIES)->get();
        return response()->json($clinics);
    }

    public function getAllHospitals()
    {
        $clinics = Clinic::where('type', TypeBusiness::HOSPITALS)->get();
        return response()->json($clinics);
    }

    public function getAllClinicActive()
    {
        if ($this->isAdmin()) {
            $clinics = Clinic::where('status', ClinicStatus::ACTIVE)->get();
        } else {
            if (Auth::user()->manager_id) {
                $clinics = Clinic::where('status', ClinicStatus::ACTIVE)->where('user_id',
                    Auth::user()->manager_id)->get();
            } else {
                $clinics = Clinic::where('status', ClinicStatus::ACTIVE)->where('user_id', Auth::user()->id)->get();
            }
        }
        return response()->json($clinics);
    }

    public function isAdmin()
    {
        $role_user = RoleUser::where('user_id', Auth::user()->id)->first();

        $roleNames = Role::where('id', $role_user->role_id)->pluck('name');

        if ($roleNames->contains('ADMIN')) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllByUserId(Request $request, $id)
    {
        $status = $request->input('status');
        if ($status && $status != ClinicStatus::DELETED) {
            $clinics = Clinic::where([
                ['status', $status],
                ['user_id', $id]
            ])->where('type', TypeBusiness::CLINICS)->get();
        } else {
            $clinics = Clinic::where([
                ['status', '!=', ClinicStatus::DELETED],
                ['user_id', $id]
            ])->where('type', TypeBusiness::CLINICS)->get();
        }
        return response()->json($clinics);
    }

    public function create(Request $request)
    {
        try {
            $clinic = new Clinic();

            $name = $request->input('name');
            if ($name == null) {
                return response("Name not null!", 400);
            }
            $name_en = $request->input('name_en');
            if ($name_en == null) {
                return response("Name English not null!", 400);
            }
            $name_laos = $request->input('name_laos');
            if ($name_laos == null) {
                return response("Name Laos not null!", 400);
            }
            $phone = $request->input('phone');
            if ($phone == null) {
                return response("Phone not null!", 400);
            }
            $email = $request->input('email');
            if ($email == null) {
                return response("Email not null!", 400);
            }
            $address_detail = $request->input('address_detail');
            $address_detail_en = $request->input('address_detail_en');
            $address_detail_laos = $request->input('address_detail_laos');
            if ($address_detail == null) {
                return response("Address not null!", 400);
            }
            if ($address_detail_en == null) {
                return response("Address English not null!", 400);
            }
            if ($address_detail_laos == null) {
                return response("Address Laos not null!", 400);
            }
            $user_id = $request->input('user_id');
            $nation_id = $request->input('nation_id');
            $province_id = $request->input('province_id');
            if ($province_id == null) {
                return response("Province not null!", 400);
            }
            $district_id = $request->input('district_id');
            if ($district_id == null) {
                return response("District not null!", 400);
            }
            $longitude = $request->input('longitude');
            $latitude = $request->input('latitude');
            $commune_id = $request->input('commune_id');
            if ($commune_id == null) {
                return response("Commune not null!", 400);
            }
            $introduce = $request->input('introduce');
            if ($introduce == null) {
                return response("Introduce not null!", 400);
            }
            if ($request->hasFile('gallery')) {
                $galleryPaths = array_map(function ($image) {
                    $itemPath = $image->store('gallery', 'public');
                    return asset('storage/' . $itemPath);
                }, $request->file('gallery'));
                $gallery = implode(',', $galleryPaths);
            } else {
                return response("Gallery not null!", 400);
            }

            $time_work = $request->input('time_work');
            if ($time_work == null) {
                return response("Time work not null!", 400);
            }

            $clinics_service = $request->input('clinics_service');
            if ($clinics_service == null) {
                return response("Clinics service not null!", 400);
            }

            $open_date = $request->input('open_date');
            if ($open_date == null) {
                return response("Open date not null!", 400);
            }
            $close_date = $request->input('close_date');
            if ($close_date == null) {
                return response("Close date not null!", 400);
            }


            $type = $request->input('type');


            $emergency = $request->has('emergency') ? $request->input('emergency') : 0;
            $insurance = $request->has('insurance') ? $request->input('insurance') : 0;
            $parking = $request->has('parking') ? $request->input('parking') : 0;
            $information = $request->input('information');
            if ($information == null) {
                return response("Hospital information not null!", 400);
            }
            $facilities = $request->input('facilities');
            if ($facilities == null) {
                return response("Hospital facilities not null!", 400);
            }
            $equipment = $request->input('equipment');
            if ($equipment == null) {
                return response("Hospital equipment not null!", 400);
            }
            $costs = $request->input('costs');
            if ($costs == null) {
                return response("Costs not null!", 400);
            }
            $representativeDoctor = $request->input('representative_doctor');
            if ($representativeDoctor == null) {
                return response("Representative doctor not null!", 400);
            }

            $department = $request->input('departments');
            $symptoms = $request->input('symptoms');



            $status = $request->input('status');

            $clinic->name = $name;
            $clinic->phone = $phone;
            $clinic->email = $email;
            $clinic->name_en = $name_en ?? '';
            $clinic->name_laos = $name_laos ?? '';
            $clinic->longitude = $longitude;
            $clinic->latitude = $latitude;
            $clinic->address_detail = $address_detail;
            $clinic->address_detail_en = $address_detail_en ?? '';
            $clinic->address_detail_laos = $address_detail_laos ?? '';
            $clinic->user_id = $user_id;
            $clinic->time_work = $time_work;
            $clinic->type = $type;
            $clinic->service_id = $clinics_service;
            $clinic->representative_doctor = $representativeDoctor;
//            $clinic->type = TypeBussiness::CLINICS;

            $clinic->department = $department;
            $clinic->symptom = $symptoms;

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
            $clinic->emergency = $emergency;
            $clinic->insurance = $insurance;
            $clinic->parking = $parking;
            $clinic->information = $information;
            $clinic->facilities = $facilities;
            $clinic->equipment = $equipment;
            $clinic->costs = $costs;


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
        } catch (Exception $exception) {
            return response($exception, 400);
        }
    }

    public function detail($id)
    {
        $clinic = Clinic::find($id);
        return response()->json($clinic);
    }

    public function update($id, Request $request)
    {
        try {
            $clinic = Clinic::find($id);

            $name = $request->input('name') ?? $clinic->name;
            $name_en = $request->input('name_en') ?? $clinic->name_en;
            $name_laos = $request->input('name_laos') ?? $clinic->name_laos;
            $phone = $request->input('phone') ?? $clinic->phone;
            $email = $request->input('email') ?? $clinic->email;
            $address_detail = $request->input('address_detail') ?? $clinic->address_detail;
            $address_detail_en = $request->input('address_detail_en') ?? $clinic->address_detail_en;
            $detail_address_laos = $request->input('address_detail_laos') ?? $clinic->address_detail_laos;
            $nation_id = $request->input('nation_id');
            $province_id = $request->input('province_id');
            $district_id = $request->input('district_id');
            $commune_id = $request->input('commune_id');
            $longitude = $request->input('longitude') ?? $clinic->longitude;
            $latitude = $request->input('latitude') ?? $clinic->latitude;
            $open_date = $request->input('open_date') ?? $clinic->open_date;
            $close_date = $request->input('close_date') ?? $clinic->close_date;
            $introduce = $request->input('introduce') ?? $clinic->introduce;
            $status = $request->input('status') ?? $clinic->status;
            $type = $request->input('type') ?? $clinic->type;
            $clinics_service = $request->input('clinics_service');
            $time_work = $request->input('time_work') ?? $clinic->time_work;
            $emergency = $request->has('emergency') ? $request->input('emergency') : 0;
            $insurance = $request->has('insurance') ? $request->input('insurance') : 0;
            $parking = $request->has('parking') ? $request->input('parking') : 0;
            $information = $request->input('information') ?? $clinic->information;
            $facilities = $request->input('facilities') ?? $clinic->facilities;
            $equipment = $request->input('equipment') ?? $clinic->equipment;
            $costs = $request->input('costs') ?? $clinic->costs;
            $representativeDoctor = $request->input('representative_doctor') ?? $clinic->representative_doctor;



            $department = $request->input('departments') ?? $clinic->department;
            $symptoms = $request->input('symptoms') ?? $clinic->symptom;

            if ($request->hasFile('gallery')) {
                $galleryPaths = array_map(function ($image) {
                    $itemPath = $image->store('gallery', 'public');
                    return asset('storage/' . $itemPath);
                }, $request->file('gallery'));
                $gallery = implode(',', $galleryPaths);
            } else {
                $gallery = $clinic->gallery;
            }

            $clinic->name = $name;
            $clinic->phone = $phone;
            $clinic->email = $email;
            $clinic->name_en = $name_en ?? '';
            $clinic->name_laos = $name_laos ?? '';
            $clinic->longitude = $longitude;
            $clinic->latitude = $latitude;
            $clinic->address_detail = $address_detail;
            $clinic->address_detail_laos = $detail_address_laos ?? '';
            $clinic->address_detail_en = $address_detail_en ?? '';
            $address = [
                'nation_id' => $nation_id,
                'province_id' => $province_id,
                'district_id' => $district_id,
                'commune_id' => $commune_id
            ];

            $clinic->department = $department;
            $clinic->symptom = $symptoms;

            $clinic->address = implode(',', $address);

            $clinic->open_date = $open_date ?? Carbon::now()->addHours(7);
            $clinic->close_date = $close_date ?? Carbon::now()->addHours(7)->addDay();
            $clinic->introduce = $introduce;
            $clinic->gallery = $gallery;
            $clinic->type = $type;
            $clinic->status = $status ?? ClinicStatus::ACTIVE;
            $clinic->service_id = $clinics_service;
            $clinic->time_work = $time_work;
            $clinic->emergency = $emergency;
            $clinic->insurance = $insurance;
            $clinic->parking = $parking;
            $clinic->information = $information;
            $clinic->facilities = $facilities;
            $clinic->equipment = $equipment;
            $clinic->costs = $costs;
            $clinic->representative_doctor = $representativeDoctor;


            $success = $clinic->save();
            if ($success) {
                return response()->json($clinic);
            }
            return response("Error, Please try again!", 400);
        } catch (Exception $exception) {
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
        } catch (Exception $exception) {
            return response($exception, 400);
        }
    }
}
