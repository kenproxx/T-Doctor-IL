<?php

namespace App\Http\Controllers\restapi;

use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Symfony\Component\String\u;

class UserApi extends Controller
{
    public function changePassword(Request $request)
    {
        try {
            $userID = $request->input('user_id');
            $user = User::find($userID);
            if ($userID && $user && $user->status == UserStatus::ACTIVE) {
                $oldPassword = $user->password;
                $currentPassword = $request->input('current_password');
                $newPassword = $request->input('new_password');
                $newPasswordConfirm = $request->input('new_password_confirm');

                $check = Hash::check($currentPassword, $oldPassword);
                if ($check) {
                    if ($newPassword != $newPasswordConfirm) {
                        return response('New password or new password confirm incorrect', 400);
                    }
                    $user->password = Hash::make($newPassword);
                    $success = $user->save();
                    if ($success) {
                        return response('Change password success!', 200);
                    }
                    return response('Change password error', 400);
                } else {
                    return response('Password incorrect', 400);
                }
            }
            return response('User not found', 404);
        } catch (\Exception $exception) {
            return response($exception, 500);
        }
    }

    public function changeEmail(Request $request)
    {
        try {
            $userID = $request->input('user_id');
            $email = $request->input('email');
            $user = User::find($userID);

            $isEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$isEmail) {
                return response('Email invalid!', 400);
            }

            $oldUser = User::where('email', $email)->first();
            if ($oldUser) {
                return response('Email already exited!', 400);
            }

            if ($userID && $user && $user->status == UserStatus::ACTIVE) {
                $user->email = $email;
                $success = $user->save();
                if ($success) {
                    return response('Change Email success!', 200);
                }
                return response('Change Email error', 400);
            }
            return response('User not found', 404);
        } catch (\Exception $exception) {
            return response($exception, 500);
        }
    }

    public function changePhoneNumber(Request $request)
    {
        try {
            $userID = $request->input('user_id');
            $phoneNumber = $request->input('phone_number');
            $user = User::find($userID);
            if ($userID && $user && $user->status == UserStatus::ACTIVE) {
                $user->phone = $phoneNumber;
                $success = $user->save();
                if ($success) {
                    return response('Change PhoneNumber success!', 200);
                }
                return response('Change PhoneNumber error', 400);
            }
            return response('User not found', 404);
        } catch (\Exception $exception) {
            return response($exception, 500);
        }
    }

    public function changeInformation(Request $request)
    {
        try {
            $userID = $request->input('user_id');

            $name = $request->input('name');
            $last_name = $request->input('last_name');
            $username = $request->input('username');
            $address_code = $request->input('address_code');

            $user = User::find($userID);
            if ($userID && $user && $user->status == UserStatus::ACTIVE) {

                $user->name = $name;
                $user->last_name = $last_name;
                $user->username = $username;
                $user->address_code = $address_code;

                $success = $user->save();
                if ($success) {
                    return response('Change Information success!', 200);
                }
                return response('Change Information error', 400);
            }
            return response('User not found', 404);
        } catch (\Exception $exception) {
            return response($exception, 500);
        }
    }

    public function changeAvt(Request $request)
    {
        try {
            $userID = $request->input('user_id');
            $user = User::find($userID);
            if ($userID && $user && $user->status == UserStatus::ACTIVE) {
                if ($request->hasFile('avatar')) {
                    $item = $request->file('avatar');
                    $itemPath = $item->store('user/avt', 'public');
                    $thumbnail = asset('storage/' . $itemPath);
                } else {
                    $thumbnail = '';
                }

                $user->avt = $thumbnail;
                $success = $user->save();
                if ($success) {
                    return response('Change PhoneNumber success!', 200);
                }
                return response('Change PhoneNumber error', 400);
            }
            return response('User not found', 404);
        } catch (\Exception $exception) {
            return response($exception, 500);
        }
    }
}
