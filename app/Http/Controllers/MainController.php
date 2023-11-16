<?php

namespace App\Http\Controllers;

use App\Enums\TypeUser;
use App\Models\Role;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function checkAdmin()
    {
        $isAdmin = false;
        $user = Auth::user();

        $role_user = DB::table('role_users')->where('user_id', $user->id)->first();
        $roleNames = Role::where('id', $role_user->role_id)->pluck('name');

        if ($roleNames->contains('ADMIN')) {
            $isAdmin = true;
        }
        return $isAdmin;
    }

    public function switchMember($member)
    {
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

        return [$role, $type];
    }

    public function generateRandomString($length)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
