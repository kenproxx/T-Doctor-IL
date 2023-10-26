<?php

namespace App\Http\Controllers\Auth;

use App\Enums\TypeUser;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
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

            $myUser = (new MainController())->switchMember($member);

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
            $user->type = $myUser[1];
            $user->status = UserStatus::ACTIVE;

            $success = $user->save();

            $roleItem = [
                'role_id' => $myUser[0]->id,
                'user_id' => $user->id
            ];

            $success = DB::table('role_users')->insert($roleItem);
            if ($success) {
                $response = $user->toArray();
                $response['role'] = $myUser[0]->name;
                return response()->json($response);
            }
            return response('Register fail!', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }
}
