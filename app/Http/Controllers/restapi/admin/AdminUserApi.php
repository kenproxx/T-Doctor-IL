<?php

namespace App\Http\Controllers\restapi\admin;

use App\Enums\Role;
use App\Enums\TypeTimeWork;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Http\Controllers\restapi\MainApi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserApi extends Controller
{
    public function getAllUser()
    {
        $users = User::where('status', '!=', UserStatus::DELETED)->orderBy('id', 'desc')->get();
        return response()->json($users);
    }

    public function detail($id)
    {
        $user = User::find($id);
        if (!$user || $user->status == UserStatus::DELETED) {
            return response('User not found!', 404);
        }
        return response()->json($user);
    }

    public function search(Request $request)
    {

    }

    public function create(Request $request)
    {
        try {
            $user = new User();
            $this->saveUser($request, $user);
            $success = $user->save();
            if ($success) {
                return response()->json($user);
            }
            return response($this->returnMessage('Error, Create error!'), 400);
        } catch (\Exception $exception) {
            return response($this->returnMessage('Error, Please try again!'), 400);
        }
    }

    private function saveUser($request, $user)
    {
        /* All user */
        $email = $request->input('email');
        $username = $request->input('username');
        $password = $request->input('password');
        $passwordConfirm = $request->input('passwordConfirm');
        $member = $request->input('member');
        $medical_history = $request->input('medical_history');
        $type = $request->input('type');
        $status = $request->input('status');
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
            return response($this->returnMessage('Email invalid!'), 400);
        }

        $oldUser = User::where('email', $email)->first();
        if ($oldUser) {
            return response($this->returnMessage('Email already exited!'), 400);
        }

        $oldUser = User::where('username', $username)->first();
        if ($oldUser) {
            return response($this->returnMessage('Username already exited!'), 400);
        }

        if ($password != $passwordConfirm) {
            return response($this->returnMessage('Password or Password Confirm incorrect!'), 400);
        }

        if (strlen($password) < 5) {
            return response($this->returnMessage('Password invalid!'), 400);
        }

        if ($type == Role::BUSINESS) {
            // kiểm tra xem fileupload có tồn tại không, nếu không thì thông báo lỗi
            if (!$request->hasFile('fileupload')) {
                return response($this->returnMessage('Cần up file giấy phép kinh doanh'), 400);
            }
            $item = $request->file('fileupload');
            $itemPath = $item->store('license', 'public');
            $img = asset('storage/' . $itemPath);
            $user->business_license_img = $img;
            $user->prescription = $prescription ? (int)$prescription : 0;
            $user->free = $free ? (int)$free : 0;
        }

        if ($type == Role::MEDICAL) {
            // kiểm tra xem fileupload có tồn tại không, nếu không thì thông báo lỗi
            if (!$request->hasFile('fileupload')) {
                return response($this->returnMessage('Cần up file giấy phép nghề nghiệp'), 400);
            }
            $item = $request->file('fileupload');
            $itemPath = $item->store('license', 'public');
            $img = asset('storage/' . $itemPath);
            $user->medical_license_img = $img;
            /* Set data for user type with medical */
            $user->year_of_experience = $experience ?? '';
            $user->hospital = $name_hospital ?? '';
            $user->specialty = $specialized_services ?? '';
            $user->service = $services_info ?? '';
            $user->prescription = $prescription ? (int)$prescription : 0;
            $user->free = $free ? (int)$free : 0;
            $user->abouts = $abouts ?? '';
        }

        if ($member == Role::NORMAL_PEOPLE || $member == Role::PAITENTS) {
            $user->medical_history = $medical_history;
        }

        $user->email = $email;
        $user->name = $name ?? '';
        $user->last_name = $name ?? '';
        $user->username = $username;
        $user->password = Hash::make($password);
        $user->phone = $contact_phone ?? '';
        $user->address_code = '';
        $user->type = $type;
        $user->abouts = 'default';
        $user->abouts_en = 'default';
        $user->abouts_lao = 'default';
        $user->status = $status;
        return $user;
    }

    private function returnMessage($message)
    {
        return (new MainApi())->returnMessage($message);
    }

    public function update($id, Request $request)
    {
        try {
            $user = User::find($id);
            if (!$user || $user->status == UserStatus::DELETED) {
                return response($this->returnMessage('User not found!'), 404);
            }
            $this->saveUser($request, $user);
            $success = $user->save();
            if ($success) {
                return response()->json($user);
            }
            return response($this->returnMessage('Error, Update error!'), 400);
        } catch (\Exception $exception) {
            return response($this->returnMessage('Error, Please try again!'), 400);
        }
    }

    public function delete($id)
    {
        try {
            $user = User::find($id);
            if (!$user || $user->status == UserStatus::DELETED) {
                return response($this->returnMessage('User not found!'), 404);
            }
            $user->status = UserStatus::DELETED;
            $success = $user->save();
            if ($success) {
                return response($this->returnMessage('Delete success!'), 200);
            }
            return response($this->returnMessage('Error, Delete error!'), 400);
        } catch (\Exception $exception) {
            return response($this->returnMessage('Error, Please try again!'), 400);
        }
    }
}
