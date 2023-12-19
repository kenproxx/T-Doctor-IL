<?php

namespace App\Http\Controllers\Auth;

use App\Enums\ClinicStatus;
use App\Enums\TypeTimeWork;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Models\Clinic;
use App\Models\Commune;
use App\Models\District;
use App\Models\Province;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        try {
            /* All user */
            $email = $request->input('email');
            $username = $request->input('username');
            $password = $request->input('password');
            $passwordConfirm = $request->input('passwordConfirm');
            $member = $request->input('member');
            $type = $request->input('type');

            /* Only type medical */
            $name = $request->input('name_doctor');
            $contact_phone = $request->input('contact_phone');
            $experience = $request->input('experience');
            $name_hospital = $request->input('name_hospital');
            $specialized_services = $request->input('specialized_services');
            $services_info = $request->input('services_info');
            $prescription = $request->input('prescription');
            $free = $request->input('free_question');
            $abouts = $request->input('abouts_doctor');

            /* Only type business */
            $open_date = $request->input('open_date');
            $close_date = $request->input('close_date');
            $experienceHospital = $request->input('experienceHospital');
            $address = $request->input('address');
            $province_id = $request->input('province_id');
            $district_id = $request->input('district_id');
            $commune_id = $request->input('commune_id');
            $representative = $request->input('representative');
            $time_work = $request->input('time_work') ?? TypeTimeWork::ALL;

            $isEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$isEmail) {
                return response('Email invalid!', 400);
            }

            $user = new User();

            $oldUser = User::where('email', $email)->first();
            if ($oldUser) {
                return response('Email already exited!', 400);
            }

            $oldUser = User::where('username', $username)->first();
            if ($oldUser) {
                return response('Username already exited!', 400);
            }

            if ($password != $passwordConfirm) {
                return response('Password or Password Confirm incorrect!', 400);
            }

            if (strlen($password) < 5) {
                return response('Password invalid!', 400);
            }

            $checkPending = false;
            if ($type == \App\Enums\Role::BUSINESS) {
                // kiểm tra xem fileupload có tồn tại không, nếu không thì thông báo lỗi
                if (!$request->hasFile('fileupload')) {
                    return response('Cần up file giấy phép kinh doanh', 400);
                }
                $item = $request->file('fileupload');
                $itemPath = $item->store('license', 'public');
                $img = asset('storage/' . $itemPath);
                $user->business_license_img = $img;
                $checkPending = true;
                $user->prescription = $prescription ? (int)$prescription : 0;
                $user->free = $free ? (int)$free : 0;
            }

            if ($type == \App\Enums\Role::MEDICAL) {
                // kiểm tra xem fileupload có tồn tại không, nếu không thì thông báo lỗi
                if (!$request->hasFile('fileupload')) {
                    return response('Cần up file giấy phép nghề nghiệp', 400);
                }
                $item = $request->file('fileupload');
                $itemPath = $item->store('license', 'public');
                $img = asset('storage/' . $itemPath);
                $user->medical_license_img = $img;
                $checkPending = true;
                /* Set data for user type with medical */
                $user->year_of_experience = $experience ?? '';
                $user->hospital = $name_hospital ?? '';
                $user->specialty = $specialized_services ?? '';
                $user->service = $services_info ?? '';
                $user->prescription = $prescription ? (int)$prescription : 0;
                $user->free = $free ? (int)$free : 0;
                $user->abouts = $abouts ?? '';
            }

            $user->email = $email;
            $user->name = $name ?? '';
            $user->last_name = $name ?? '';
            $user->username = $username;
            $user->password = Hash::make($password);
            $user->phone = $contact_phone ?? '';
            $user->address_code = '';
            $user->type = $type;

            if ($checkPending) {
                $user->status = UserStatus::PENDING;
            } else {
                $user->status = UserStatus::ACTIVE;
            }

            $success = $user->save();

            if ($user->type == \App\Enums\Role::BUSINESS) {
                $clinic = new Clinic();
                $currentDate = Carbon::now();
                $openDateTime = Carbon::createFromFormat('Y-m-d H:i', $currentDate->format('Y-m-d') . ' ' . $open_date);
                $closeDateTime = Carbon::createFromFormat('Y-m-d H:i', $currentDate->format('Y-m-d') . ' ' . $close_date);
                $formattedOpenDateTime = $openDateTime->format('Y-m-d\TH:i');
                $formattedCloseDateTime = $closeDateTime->format('Y-m-d\TH:i');

                $clinic->address_detail = $address;
                $province = Province::find($province_id);
                $district = District::find($district_id);
                $commune = Commune::find($commune_id);
                $clinic->address = $address . ',' . $province->name . ',' . $district->name . ',' . $commune->name;

                $clinic->name = $representative;
                $clinic->open_date = $formattedOpenDateTime ?? '';
                $clinic->close_date = $formattedCloseDateTime ?? '';
                $clinic->experience = $experienceHospital;
                $clinic->gallery = '';
                $clinic->user_id = $user->id;
                $clinic->time_work = $time_work;
                $clinic->status = ClinicStatus::ACTIVE;
                $clinic->type =$member;
                $clinic->representative_doctor = $representative;

                $clinic->save();

                $user->province_id = $province_id;
                $user->district_id = $district_id;
                $user->commune_id = $commune_id;
                $user->address_code = $province->name;
                $user->detail_address = $address;
                $user->year_of_experience = $experienceHospital;
                $user->bac_si_dai_dien = $representative;
                $user->name = $representative;
                $user->save();
            }

            if ($success) {
                (new MainController())->createRoleUser($member, $username);
                $response = $user->toArray();
                $roleUser = RoleUser::where('user_id', $user->id)->first();
                $role = Role::find($roleUser->role_id);
                $response['role'] = $role->name;
                return response()->json($response);
            }
            return response('Register fail!', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }
}
