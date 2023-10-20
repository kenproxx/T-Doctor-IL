<?php

namespace App\Http\Controllers;

use App\Enums\TypeUser;
use App\Enums\UserStatus;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $loginRequest = $request->input('login_request');
            $password = $request->input('password');

            $credentials = [
                'email' => $loginRequest,
                'password' => $password,
            ];

            $user = User::where('email', $loginRequest)->first();
            if (!$user) {
                toast('Account not found!', 'error', 'top-right');
                return back();
            } else {
                if ($user && $user->status == UserStatus::INACTIVE) {
                    toast('Account not active!', 'error', 'top-right');
                    return back();
                } else if ($user && $user->status == UserStatus::BLOCKED) {
                    toast('Account has been blocked!', 'error', 'top-right');
                    return back();
                }
            }

            if (Auth::attempt($credentials)) {
                toast('Welcome ' . $user->email, 'success', 'top-right');
                return redirect(route('home'));
            } else {
                toast('Email or password incorrect', 'error', 'top-right');
            }
            return back();
        } catch (\Exception $exception) {
            toast('Error, Please try again!', 'error', 'top-right');
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

            switch ($member) {
                case 'Business member':
                    $role = Role::where('name', \App\Enums\Role::BUSINESS)->first();
                    $type = TypeUser::HOSPITALS;
                    break;
                case 'Medical services':
                    $role = Role::where('name', \App\Enums\Role::MEDICAL)->first();
                    $type = TypeUser::DOCTORS;
                    break;
                default:
                    $role = Role::where('name', \App\Enums\Role::NORMAL)->first();
                    $type = TypeUser::PAITENTS;
                    break;
            }

            $user = new User();
            $oldUser = User::where('email', $email)->first();
            if ($oldUser) {
                toast('Email already exited!', 'error', 'top-right');
                return back();
            }

            if ($password != $passwordConfirm) {
                toast('Password or Password Confirm incorrect!', 'error', 'top-right');
                return back();
            }

            $user->email = $email;
            $user->name = '';
            $user->last_name = '';
            $user->password = Hash::make($password);
            $user->username = $username;
            $user->phone = '';
            $user->address_code = '';
            $user->type = $type;
            $user->status = UserStatus::ACTIVE;

            $success = $user->save();

            $roleItem = [
                'role_id' => $role->id,
                'user_id' => $user->id
            ];

            $success = DB::table('role_users')->insert($roleItem);
            if ($success) {
                toast('Register success!', 'success', 'top-right');
                return redirect(route('home'));
            }
            toast('Register fail!', 'error', 'top-right');
            return back();
        } catch (\Exception $exception) {
            toast('Error, Please try again!', 'error', 'top-right');
            return back();
        }
    }
}
