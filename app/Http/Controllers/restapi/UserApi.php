<?php

namespace App\Http\Controllers\restapi;

use App\Enums\TypeMedical;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Models\Department;
use App\Models\Symptom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
//                $user->username = $username;
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

    public function updateProfile(Request $request)
    {
        try {
            $userID = $request->input('user_id');

            $name = $request->input('name');
            $last_name = $request->input('last_name');
            $username = $request->input('username');

            $email = $request->input('email');
            $phone_number = $request->input('phone_number');
            $current_password = $request->input('current_password');
            $new_password = $request->input('new_password');
            $confirm_password = $request->input('confirm_password');

            $nation_id = $request->input('nation_id');
            $province_id = $request->input('province_id');
            $district_id = $request->input('district_id');
            $commune_id = $request->input('commune_id');

            $gender = $request->input('gender');
            $birthday = $request->input('birthday');

            $user = User::find($userID);
            if ($userID && $user && $user->status == UserStatus::ACTIVE) {
                $user->name = $name;
                $user->last_name = $last_name;

                if ($user->email != $email) {
                    $isEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
                    if (!$isEmail) {
                        return response('Email invalid!', 400);
                    }

                    $oldUser = User::where('email', $email)->first();
                    if ($oldUser) {
                        return response('Email already exited!', 400);
                    }
                    $user->email = $email;
                }

                if ($user->username != $username) {
                    $oldUser = User::where('username', $username)->first();
                    if ($oldUser) {
                        return response('Username already exited!', 400);
                    }
                    $user->username = $username;
                }

                $user->phone = $phone_number;

                if ($current_password || $new_password || $confirm_password) {
                    $oldPassword = $user->password;
                    $check = Hash::check($current_password, $oldPassword);
                    if (!$check) {
                        return response('Password incorrect', 400);
                    }
                    if (strlen($new_password) < 5) {
                        return response('Password invalid!', 400);
                    }
                    if ($new_password != $confirm_password) {
                        return response('New password or new password confirm incorrect', 400);
                    }
                    $user->password = Hash::make($new_password);
                }

                $user->nation_id = $nation_id;
                $user->province_id = $province_id;
                $user->district_id = $district_id;
                $user->commune_id = $commune_id;

                $user->gender = $gender;
                $user->birthday = $birthday;

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

    public function searchDoctor(Request $request)
    {
        $name = $request->input('keyword');
        $name = (new MainController())->vn_to_str($name);
        $listDoctor = User::where('member', TypeMedical::DOCTORS)
            ->where('status', UserStatus::ACTIVE)
            ->when($name, function ($query) use ($name) {
                $query->where(DB::raw('LOWER(users.name)'), 'like', '%' . strtolower($name) . '%');
            })
            ->when($name, function ($query) use ($name) {
                $departments = Department::where(DB::raw('LOWER(name)'), 'like', '%' . strtolower($name) . '%')->get();
                $arrayDepartmentID = $departments->pluck('id')->toArray();
                if ($arrayDepartmentID) {
                    $query->orWhereRaw("FIND_IN_SET(?, department_id) > 0", $arrayDepartmentID);
                }
            })
            ->when($name, function ($query) use ($name) {
                $symptoms = Symptom::where(DB::raw('LOWER(name)'), 'like', '%' . strtolower($name) . '%')->get();
                $arraySymptomID = $symptoms->pluck('id')->toArray();
                if ($arraySymptomID) {
                    $query->orWhereRaw("FIND_IN_SET(?, symptom_id) > 0", $arraySymptomID);
                }
            })
            ->orderBy('id', 'desc')
            ->get();
        return response()->json($listDoctor);
    }
}
