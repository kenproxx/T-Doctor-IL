<?php

namespace App\Http\Controllers\restapi;

use App\Enums\TypeMedical;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\MedicalFavourite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicalFavouriteApi extends Controller
{
    public function getAll(Request $request)
    {
        $userID = $request->input('user_id');
        $medical_favourites = DB::table('medical_favourites')
            ->join('users', 'users.id', '=', 'medical_favourites.medical_id')
            ->where('medical_favourites.user_id', $userID)
            ->select( 'medical_favourites.*', 'users.name')
            ->get();

        return response()->json($medical_favourites);
    }

    public function findByUserIdAndMedicalID(Request $request)
    {
        $userID = $request->input('user_id');
        $medical_id = $request->input('medical_id');

        $medical_favourites = DB::table('medical_favourites')
            ->join('users', 'users.id', '=', 'medical_favourites.user_id')
            ->where('medical_favourites.user_id', $userID)
            ->where('medical_favourites.medical_id', $medical_id)
            ->where('users.status', UserStatus::ACTIVE)
            ->select('medical_favourites.*')
            ->get();

        return response()->json($medical_favourites);
    }

    public function create(Request $request)
    {
        try {
            $userID = $request->input('user_id');
            $medical_id = $request->input('medical_id');
            $type = $request->input('type');
            if (!$type) {
                $type = TypeMedical::DOCTORS;
            }

            if (!$userID || !$medical_id) {
                return response('User or Medical not empty', 404);
            }

            $user = User::find($userID);
            if (!$user || $user->status != UserStatus::ACTIVE) {
                return response('User not found', 404);
            }

            $medical = User::find($medical_id);
            if (!$medical) {
                return response('Medical not found', 404);
            }

            $exit = MedicalFavourite::where('user_id', $userID)->where('medical_id', $medical_id)->first();
            if ($exit) {
                return response('Favorite medical has been created', 400);
            }

            $medical_favourite = new MedicalFavourite();
            $medical_favourite->user_id = $userID;
            $medical_favourite->medical_id = $medical_id;
            $medical_favourite->type = $type;

            $success = $medical_favourite->save();
            if ($success) {
                return response()->json($medical_favourite);
            }
            return response('Adding favorite medical encountered an error', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

    public function delete($id)
    {
        $medical_favourite = MedicalFavourite::find($id);
        if ($medical_favourite) {
            $success = MedicalFavourite::where('id', $id)->delete();
            if ($success) {
                return response('Delete success', 200);
            }
            return response('Delete error', 400);
        }
        return response('Not found', 404);
    }
}
