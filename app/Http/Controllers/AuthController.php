<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        return view('home', compact('widget'));
    }

    public function login(Request $request)
    {
        dd($request->input());
    }

    public function register(Request $request)
    {
        dd($request->input());
    }
}
