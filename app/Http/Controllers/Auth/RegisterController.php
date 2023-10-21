<?php

namespace App\Http\Controllers\Auth;

use App\Enums\TypeUser;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

            switch ($member) {
                case 'PHARMACEUTICAL_COMPANIES':
                    $role = Role::where('name', \App\Enums\Role::PHARMACEUTICAL_COMPANIES)->first();
                    $type = TypeUser::PHARMACEUTICAL_COMPANIES;
                    break;
                case 'HOSPITALS':
                    $role = Role::where('name', \App\Enums\Role::HOSPITALS)->first();
                    $type = TypeUser::HOSPITALS;
                    break;
                case 'CLINICS':
                    $role = Role::where('name', \App\Enums\Role::CLINICS)->first();
                    $type = TypeUser::CLINICS;
                    break;
                case 'PHARMACIES':
                    $role = Role::where('name', \App\Enums\Role::PHARMACIES)->first();
                    $type = TypeUser::PHARMACIES;
                    break;
                case 'SPAS':
                    $role = Role::where('name', \App\Enums\Role::SPAS)->first();
                    $type = TypeUser::SPAS;
                    break;
                default:
                    $role = Role::where('name', \App\Enums\Role::OTHERS)->first();
                    $type = TypeUser::OTHERS;
                    break;
            }

            $user = new User();
            $oldUser = User::where('email', $email)->first();
            if ($oldUser) {
                return response('Email already exited!', 400);
            }

            if ($password != $passwordConfirm) {
                return response('Password or Password Confirm incorrect!', 400);
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
                $response = $user->toArray();
                $response['role'] = $role->name;
                return response()->json($response);
            }
            return response('Register fail!', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }
}
