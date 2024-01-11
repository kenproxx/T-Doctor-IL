<?php

namespace App\Http\Controllers\restapi;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainApi extends Controller
{
    public function returnMessage($message)
    {
        return ['message' => $message];
    }

    public function isAdmin($user_id)
    {
        $role_user = RoleUser::where('user_id', $user_id)->first();

        $roleNames = Role::where('id', $role_user->role_id)->pluck('name');

        if ($roleNames->contains('ADMIN')) {
            return true;
        } else {
            return false;
        }
    }
}
