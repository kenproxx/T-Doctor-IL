<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Http\Controllers\restapi\MainApi;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function sendCode(Request $request)
    {
        try {
            $email = $request->input('email');

            if (!$email) {
                return response((new MainApi())->returnMessage('Email not empty!'), 400);
            }

            $code = (new MainController())->generateRandomNumber(6);

            $user = User::where('email', $email)->where('status', UserStatus::DELETED)->first();

            if ($user){

            }
            return response((new MainApi())->returnMessage('User not found!'), 404);
        } catch (\Exception $exception) {
            return response((new MainApi())->returnMessage('Error, please try again!'), 400);
        }
    }

    public function resetTokenLogin(Request $request)
    {

    }
}
