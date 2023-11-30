<?php

namespace App\Http\Controllers;

use App\Enums\TypeUser;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function checkAdmin()
    {
        $adminRole = ['ADMIN'];
        return $this->checkRoles($adminRole);
    }

    private function checkRoles($roleNames)
    {
        $hasRole = false;
        if (Auth::check()) {
            $user = Auth::user();
            $role_user = DB::table('role_users')->where('user_id', $user->id)->first();
            $userRoleNames = Role::where('id', $role_user->role_id)->pluck('name');

            foreach ($roleNames as $roleName) {
                if ($userRoleNames->contains($roleName)) {
                    $hasRole = true;
                    break;
                }
            }
        }
        return $hasRole;
    }

    public function checkBusiness()
    {
        $businessRoles = [
            'PHARMACEUTICAL COMPANIES',
            'HOSPITALS',
            'CLINICS',
            'PHARMACIES',
            'SPAS',
            'OTHERS',
            'ADMIN'
        ];

        return $this->checkRoles($businessRoles);
    }

    public function checkMedical()
    {
        $medicalRoles = [
            'DOCTORS',
            'PHAMACISTS',
            'THERAPISTS',
            'ESTHETICIANS',
            'NURSES',
            'PHARMACEUTICAL COMPANIES',
            'HOSPITALS',
            'CLINICS',
            'PHARMACIES',
            'SPAS',
            'OTHERS',
            'ADMIN'
        ];

        return $this->checkRoles($medicalRoles);
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

    public function createRoleUser($member, $username)
    {
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
    }

    public function setLanguage(Request $request, $locale)
    {
        switch ($locale) {
            case 'laos':
                $lang = 'laos';
                break;
            case 'vi':
                $lang = 'vi';
                break;
            default:
                $lang = 'en';
                break;
        }
        Session::put('locale', $lang);
        return redirect()->back();
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
