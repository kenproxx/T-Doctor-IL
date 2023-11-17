<?php

namespace App\Http\Controllers;

use App\Enums\UserStatus;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $loginRequest = $request->input('email');
            $password = $request->input('password');

            $credentials = [
                'email' => $loginRequest,
                'password' => $password,
            ];

            $user = User::where('email', $loginRequest)->first();
            if (!$user) {
                toast('Account not found!', 'error', 'top-left');
                return back();
            } else {
                if ($user) {
                    switch ($user->status) {
                        case UserStatus::ACTIVE:
                            break;
                        case UserStatus::INACTIVE:
                            toast('Account not active!', 'error', 'top-left');
                            return back();
                        case UserStatus::BLOCKED:
                            toast('Account has been blocked!', 'error', 'top-left');
                            return back();
                        case UserStatus::DELETED:
                            toast('Account has been deleted!', 'error', 'top-left');
                            return back();
                        case UserStatus::PENDING:
                            toast('Account is pending!', 'error', 'top-left');
                            return back();
                    }
                }
            }

            if (Auth::attempt($credentials)) {
                $token = JWTAuth::fromUser($user);
                setCookie('accessToken', $token);
                toast('Welcome ' . $user->email, 'success', 'top-left');

                $role_user = DB::table('role_users')->where('user_id', $user->id)->first();
                $roleNames = Role::where('id', $role_user->role_id)->pluck('name');

                if ($roleNames->contains('DOCTORS') || $roleNames->contains('PHAMACISTS') || $roleNames->contains('THERAPISTS') || $roleNames->contains('ESTHETICIANS') || $roleNames->contains('NURSES') || $roleNames->contains('PHARMACEUTICAL COMPANIES') || $roleNames->contains('HOSPITALS') || $roleNames->contains('CLINICS') || $roleNames->contains('PHARMACIES') || $roleNames->contains('SPAS') || $roleNames->contains('OTHERS') || $roleNames->contains('ADMIN')) {
                    return redirect(route('homeAdmin'));
                }

                return redirect(route('home'));
            } else {
                toast('Email or password incorrect', 'error', 'top-left');
            }
            return back();
        } catch (Exception $exception) {
            toast('Error, Please try again!', 'error', 'top-left');
            return back();
        }
    }

    public function register(Request $request)
    {
        try {
            $email = $request->input('email');
            $username = $request->input('username');
            $password = $request->input('password');
            $passwordConfirm = $request->input('passwordConfirm');
            $member = $request->input('member');
            $type = $request->input('type');
            $user = new User();

            $checkPending = false;

            $isEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$isEmail) {
                toast('Email invalid!', 'error', 'top-left');
                return back();
            }

            $oldUser = User::where('email', $email)->first();
            if ($oldUser) {
                toast('Email already exited!', 'error', 'top-left');
                return back();
            }

            $oldUser = User::where('username', $username)->first();
            if ($oldUser) {
                toast('Username already exited!', 'error', 'top-left');
                return back();
            }

            if ($password != $passwordConfirm) {
                toast('Password or Password Confirm incorrect!', 'error', 'top-left');
                return back();
            }

            if (strlen($password) < 5) {
                toast('Password invalid!', 'error', 'top-left');
                return back();
            }

            if ($type == \App\Enums\Role::BUSINESS) {
                // kiểm tra xem fileupload có tồn tại không, nếu không th ì thông báo lỗi
                if (!$request->hasFile('fileupload')) {
                    toast('Cần up file giấy phép kinh doanh', 'error', 'top-left');
                    return back();
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
                    toast('Cần up file giấy phép hành nghề', 'error', 'top-left');
                    return back();
                }
                $item = $request->file('fileupload');
                $itemPath = $item->store('license', 'public');
                $img = asset('storage/' . $itemPath);
                $user->medical_license_img = $img;
                $checkPending = true;
            }

            $passwordHash = Hash::make($password);

            $user->email = $email;
            $user->name = '';
            $user->last_name = '';
            $user->password = $passwordHash;
            $user->username = $username;
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
                $role = Role::where('name', $member)->first();
                $newUser = User::where('username', $username)->first();
                if ($role) {
                    RoleUser::create([
                        'role_id' => $role->id,
                        'user_id' => $newUser->id
                    ]);
                } else {
                    $roleNormal = Role::where('name', \App\Enums\Role::PAITENTS)->first();
                    RoleUser::create([
                        'role_id' => $roleNormal->id,
                        'user_id' => $newUser->id
                    ]);
                }

                toast('Register success!', 'success', 'top-left');
                return redirect(route('home'));
            }
            toast('Register fail!', 'error', 'top-left');
            return back();
        } catch (Exception $exception) {
            toast('Error, Please try again!', 'error', 'top-left');
            return back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        setCookie('accessToken', null);
        return redirect('/');
    }

    public function setCookie($name, $value)
    {
        $minutes = 3600;
        $response = new Response('Set Cookie');
        $response->withCookie(cookie($name, $value, $minutes));
        return $response;
    }
}
