<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function listRatingUser()
    {
        return view('ui.member-ratings.list-member');
    }
}
