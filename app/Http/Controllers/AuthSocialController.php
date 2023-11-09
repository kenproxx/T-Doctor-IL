<?php

namespace App\Http\Controllers;

use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthSocialController extends Controller
{

    public function getGoogleSignInUrl()
    {
        try {
            $url = Socialite::driver('google')->stateless()
                ->redirect()->getTargetUrl();
            return redirect($url);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function loginCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            if ($googleUser->getEmail() == null || $googleUser->getName() == null) {
                return redirect()->route('login')->with('error', 'Error');
            }

            $existingUser = User::where('email', $googleUser->email)->first();

            $password = (new MainController())->generateRandomString(8);
            $passwordHash = Hash::make($password);

            if ($existingUser) {
                auth()->login($existingUser, true);
            } else {
                $newUser = new User;
                $newUser->provider_name = "google";
                $newUser->provider_id = $googleUser->getId();
                $newUser->name = $googleUser->getName();
                $newUser->last_name = $googleUser->getName();
                $newUser->email = $googleUser->getEmail();
                $newUser->phone = '';
                $newUser->username = $googleUser->getId() . $googleUser->getEmail();
                $newUser->address_code = "";
                $newUser->password = $passwordHash;
                $newUser->type = "OTHERS";
                $newUser->email_verified_at = now();
                $newUser->avt = $googleUser->getAvatar();

                $newUser->save();

                auth()->login($newUser, true);
            }
            toast('Register success!', 'success', 'top-left');
            return redirect()->route('login.social.choose.role');
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function chooseRole(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('auth.social-choose-role', compact('user'));
        }
        return view('layouts.error.not-found');
    }

    public function saveUser(Request $request)
    {
        try {
            $user = Auth::user();

            $name = $request->input('name');
            $lastname = $request->input('last_name');
            $phone = $request->input('phone');
            $address_code = $request->input('address_code');

            $email = $request->input('email');
            $username = $request->input('username');
            $password = $request->input('password');
            $passwordConfirm = $request->input('passwordConfirm');
            $member = $request->input('member');

            $isEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$isEmail) {
                toast('Error, Email invalid!', 'error', 'top-left');
                return back();
            }

            $myUser = (new MainController())->switchMember($member);

            if ($username != Auth::user()->username) {
                $oldUser = User::where('username', $username)->first();
                if ($oldUser) {
                    toast('Error, Username already exited!', 'error', 'top-left');
                    return back();
                }
            }

            if ($email != Auth::user()->email) {
                $oldUser = User::where('email', $email)->first();
                if ($oldUser) {
                    toast('Error, Email already exited!', 'error', 'top-left');
                    return back();
                }
            }

            if ($password != $passwordConfirm) {
                toast('Error, Password or Password Confirm incorrect!', 'error', 'top-left');
                return back();
            }

            if (strlen($password) < 5) {
                toast('Error, Password invalid!', 'error', 'top-left');
                return back();
            }

            $user->provider_name = '';
            $user->provider_id = '';
            $user->name = $name;
            $user->last_name = $lastname;
            $user->email = $email;
            $user->phone = $phone;
            $user->username = $username;
            $user->address_code = $address_code;
            $user->password = Hash::make($password);

            $user->type = $myUser[1];
            $user->status = UserStatus::ACTIVE;

            $user->save();

            $roleItem = [
                'role_id' => $myUser[0]->id,
                'user_id' => $user->id
            ];

            $success = DB::table('role_users')->insert($roleItem);
            if ($success) {
                toast('Update success!', 'success', 'top-left');
                return redirect()->route('home');
            }
            toast('Register error!', 'error', 'top-left');
            return back();
        } catch (\Exception $exception) {
            toast('Error, Please try again!', 'error', 'top-left');
            return back();
        }
    }
}
