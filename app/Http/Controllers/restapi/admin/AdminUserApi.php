<?php

namespace App\Http\Controllers\restapi\admin;

use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserApi extends Controller
{
    public function getAllUser()
    {
        $users = User::where('status', '!=', UserStatus::DELETED)->orderBy('id', 'desc')->get();
        return response()->json($users);
    }

    public function detail($id)
    {
        $user = User::find($id);
        if (!$user || $user->status == UserStatus::DELETED) {
            return response('User not found!', 404);
        }
        return response()->json($user);
    }

    public function search(Request $request)
    {

    }

    public function create(Request $request)
    {

    }

    public function update($id, Request $request)
    {

    }

    public function delete($id)
    {
        try {
            $user = User::find($id);
            if (!$user || $user->status == UserStatus::DELETED) {
                return response('User not found!', 404);
            }
            $user->status = UserStatus::DELETED;
            return response()->json($user);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

    private function saveUser($request, $user)
    {

    }
}
