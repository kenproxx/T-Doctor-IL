<?php

namespace App\Http\Controllers\restapi;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

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

    public function handleToken()
    {
        $array_data = null;
        try {
            $user = JWTAuth::parseToken()->authenticate();
            $array_data['status'] = 200;
            $array_data['data'] = $user;
            return $array_data;
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            $array_data['status'] = 444;
            $array_data['message'] = 'Token expired';
            return $array_data;
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            $array_data['status'] = 400;
            $array_data['message'] = 'Token invalid';
            return $array_data;
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            $array_data['status'] = 400;
            $array_data['message'] = $e->getMessage();
            return $array_data;
        }
    }
}
