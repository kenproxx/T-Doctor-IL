<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
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
}
