<?php

namespace App\Http\Controllers\admin;

use App\Enums\DepartmentStatus;
use App\Http\Controllers\Controller;
use App\Models\Department;

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
        $departments = Department::where('status', DepartmentStatus::ACTIVE)->get();
        return view('admin.user.create', compact('departments'));
    }
}
