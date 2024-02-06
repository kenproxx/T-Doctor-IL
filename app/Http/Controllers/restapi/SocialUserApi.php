<?php

namespace App\Http\Controllers\restapi;

use App\Enums\SocialUserStatus;
use App\Http\Controllers\Controller;
use App\Models\SocialUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialUserApi extends Controller
{
    public function getAll(Request $request)
    {
        $socialUsers = SocialUser::where('status', SocialUserStatus::ACTIVE)->get();
        return response()->json($socialUsers);
    }

    public function getById(Request $request, $id)
    {
        $socialUser = SocialUser::find($id);
        if (!$socialUser || $socialUser->status != SocialUserStatus::ACTIVE) {
            return response('Not found', 404);
        }
        return response()->json($socialUser);
    }

    public function getByUserId(Request $request, $userID)
    {
        $socialUser = SocialUser::where('user_id', $userID)->first();
        if (!$socialUser || $socialUser->status != SocialUserStatus::ACTIVE) {
            return response('Not found', 404);
        }
        return response()->json($socialUser);
    }

    public function create(Request $request)
    {
        try {
            $socialUser = new SocialUser();

            $userID = $request->input('user_id');

            $user = User::find($userID);
            if (!$user) {
                return response('User not found', 404);
            }

            $socialUser = $this->processSave($socialUser, $request);

            $success = $socialUser->save();
            if ($success) {
                return response()->json($socialUser);
            }
            return response('Create error', 400);
        } catch (Exception $exception) {
            return response($exception, 400);
        }
    }

    private function processSave($socialUser, Request $request)
    {
        $userID = $request->input('user_id');

        $socialUser->user_id = $userID;
        $linkChecks = [
            'instagram' => '/^(https?:\/\/)?(www\.)?instagram\.com\/.*$/',
            'facebook' => '/^(https?:\/\/)?(www\.)?facebook\.com\/.*$/',
            'tiktok' => '/^(https?:\/\/)?(www\.)?tiktok\.com\/.*$/',
            'youtube' => '/^(https?:\/\/)?(www\.)?youtube\.com\/.*$/',
            'google_review' => '/^(https?:\/\/)?(www\.)?google\.com\/.*$/',
        ];
        if ($request->input('facebook') != null) {
            $check_facebook = preg_match($linkChecks['facebook'], $request->input('facebook'));
            if ($check_facebook == 0) {
                return response('Invalid facebook link', 400);
            }
        }
        if ($request->input('instagram') != null) {
            $check_instagram = preg_match($linkChecks['instagram'], $request->input('instagram'));
            if ($check_instagram == 0) {
                return response('Invalid instagram link', 400);
            }
        }
        if ($request->input('tiktok') != null) {
            $check_tiktok = preg_match($linkChecks['tiktok'], $request->input('tiktok'));
            if ($check_tiktok == 0) {
                return response('Invalid tiktok link', 400);
            }
        }
        if ($request->input('youtube') != null) {
            $check_youtube = preg_match($linkChecks['youtube'], $request->input('youtube'));
            if ($check_youtube == 0) {
                return response('Invalid youtube link', 400);
            }
        }
        if ($request->input('google_review') != null) {
            $check_google_review = preg_match($linkChecks['google_review'], $request->input('google_review'));
            if ($check_google_review == 0) {
                return response('Invalid google review link', 400);
            }
        }

//        $socialUser->facebook = $request->input('facebook');
//        $socialUser->instagram = $request->input('instagram');
//
//        $socialUser->youtube = $request->input('youtube');
//        $socialUser->tiktok = $request->input('tiktok');
//
//        $socialUser->google_review = $request->input('google_review');

        $socialUser->other = $request->input('other');

        $socialUser->status = SocialUserStatus::ACTIVE;

        return $socialUser;
    }

    public function update(Request $request, $id)
    {
        try {
            $socialUser = SocialUser::find($id);
            if (!$socialUser || $socialUser->status != SocialUserStatus::ACTIVE) {
                return response('Not found', 404);
            }

            $userID = $request->input('user_id');
            $user = User::find($userID);
            if (!$user) {
                return response('User not found', 404);
            }

            $socialUser = $this->processSave($socialUser, $request);

            $success = $socialUser->save();
            if ($success) {
                return response()->json($socialUser);
            }
            return response('Update error', 400);
        } catch (Exception $exception) {
            return response($exception, 400);
        }
    }

    public function delete($id)
    {
        try {
            $socialUser = SocialUser::find($id);
            if (!$socialUser || $socialUser->status != SocialUserStatus::ACTIVE) {
                return response('Not found', 404);
            }

            $socialUser->status = SocialUserStatus::DELETED;

            $success = $socialUser->save();
            if ($success) {
                return response()->json($socialUser);
            }
            return response('Delete error', 400);
        } catch (Exception $exception) {
            return response($exception, 400);
        }
    }

    public function createOrEdit(Request $request)
    {
        try {
            $socialUser = SocialUser::where('user_id', Auth::user()->id)->first();
            if (!$socialUser || $socialUser->status != SocialUserStatus::ACTIVE) {
                $socialUser = new SocialUser();
            }

            $socialUser = $this->processSave($socialUser, $request);

            $success = $socialUser->save();
            if ($success) {
                return response()->json($socialUser);
            }
            return response('Update error', 400);
        } catch (Exception $exception) {
            return response($exception, 400);
        }
    }

    public function getSocialByUserId($userId)
    {
        $data = SocialUser::where('user_id', $userId)->get();

        return response()->json($data);
    }
}
