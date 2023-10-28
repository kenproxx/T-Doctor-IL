<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        if (!Auth::check()) {
            setCookie('accessToken', null);
        }
        return view('home');
    }
    public function home()
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        return view('admin.home-admin', compact('widget'));
    }

    public function listProduct()
    {
        return view('admin.list-product');
    }
    public function listClinics()
    {
        return view('admin.list-clinics');
    }
}
