<?php

namespace App\Http\Controllers;

use App\Models\Nation;
use App\Models\Role;
use App\Models\SocialUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roles = Role::where('name', '!=',\App\Enums\Role::ADMIN)->get();
        $roleUser = DB::table('role_users')->where('user_id', Auth::user()->id)->first();
        $roleItem = Role::find($roleUser->role_id);
        $isAdmin = (new MainController())->checkAdmin();
        $socialUser = SocialUser::where('user_id', Auth::user()->id)->first();
        $nations = Nation::all();
        return view('profile', compact('roles', 'roleItem', 'isAdmin', 'socialUser', 'nations'));
    }

    public function infoUser($userId) {
        $user = User::find($userId);
        $role = $user->roles()->where('user_id', $userId)->first();

        $responseData = [
            'infoUser' => $user,
            'roleUser' => $role,
        ];
        return response()->json($responseData);
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',

            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
            'phone' => 'required|string|max:255',

            'address_code' => 'required|string|max:255',

            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:6|max:12|required_with:current_password',
            'password_confirmation' => 'nullable|min:6|max:12|required_with:new_password|same:new_password'
        ]);

        $username = $request->input('username');

        $user = User::findOrFail(Auth::user()->id);

        if ($username != Auth::user()->username) {
            $oldUser = User::where('username', $username)->first();
            if ($oldUser) {
                toast('Error, Username already exited!', 'error', 'top-left');
                return back();
            }
        }

        $user->username = $username;

        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');

        $user->email = $request->input('email');
        $user->phone = $request->input('phone');

        $user->address_code = $request->input('address_code');

        $user->nation_id = $request->input('nation_id');
        $user->province_id = $request->input('province_id');
        $user->district_id = $request->input('district_id');
        $user->commune_id = $request->input('commune_id');

        if (!is_null($request->input('current_password'))) {
            if (Hash::check($request->input('current_password'), $user->password)) {
                $password = $request->input('new_password');
                $passwordHash = Hash::make($password);
                $user->password = $passwordHash;
            } else {
                return redirect()->back()->withInput();
            }
        }

        $user->save();

        return redirect()->route('profile')->withSuccess('Profile updated successfully.');
    }
}
