<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    public function list()
    {
        return view('admin.user.list');
    }

    public function detail($id)
    {
        return view('admin.user.detail');
    }

    public function create()
    {
        return view('admin.user.create');
    }
}
