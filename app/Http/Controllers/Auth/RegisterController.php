<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        try {
            $email = $request->input('email');
            $username = $request->input('username');
            $password = $request->input('password');
            $passwordConfirm = $request->input('passwordConfirm');
            $member = $request->input('member');
            $type = $request->input('type');

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
                // kiểm tra xem fileupload có tồn tại không, nếu không th ì thông báo lỗi
                if (!$request->hasFile('fileupload')) {
                    return response('Cần up file giấy phép kinh doanh', 400);
                }
                $item = $request->file('fileupload');
                $itemPath = $item->store('license', 'public');
                $img = asset('storage/' . $itemPath);
                $user->business_license_img = $img;
                $checkPending = true;
            }

            if ($type == \App\Enums\Role::MEDICAL) {
                // kiểm tra xem fileupload có tồn tại không, nếu không th ì thông báo lỗi
                if (!$request->hasFile('fileupload')) {
                    return response('Cần up file giấy phép nghề nghiệp', 400);
                }
                $item = $request->file('fileupload');
                $itemPath = $item->store('license', 'public');
                $img = asset('storage/' . $itemPath);
                $user->medical_license_img = $img;
                $checkPending = true;
            }

            $user->email = $email;
            $user->name = '';
            $user->last_name = '';
            $user->username = $username;
            $user->password = Hash::make($password);
            $user->phone = '';
            $user->address_code = '';
            $user->type = $type;

            if ($checkPending) {
                $user->status = UserStatus::PENDING;
            } else {
                $user->status = UserStatus::ACTIVE;
            }

            $success = $user->save();

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
