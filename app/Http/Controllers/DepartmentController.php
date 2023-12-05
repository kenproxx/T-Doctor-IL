<?php

namespace App\Http\Controllers;

use App\Enums\DepartmentStatus;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function index() {
        $departments = Department::all();

        return view('admin.department_symptom.lists-department', ['departments' => $departments]);
    }

    public function create()
    {
        return view('admin.department_symptom.create-department');
    }

    public function store(Request $request)
    {
        $department = new Department();
        $name = $request->input('name');

        if ($request->hasFile('image')) {
            $item = $request->file('image');
            $itemPath = $item->store('departments', 'public');
            $thumbnail = asset('storage/' . $itemPath);
        } else {
            $thumbnail = $department->thumbnail;
        }

        $description = $request->input('description');
        $status = DepartmentStatus::ACTIVE;
        $user_id = Auth::user()->id;

        $department->name = $name;
        $department->thumbnail = $thumbnail;
        $department->description = $description;
        $department->status = $status;
        $department->user_id = $user_id;
        $department->save();

        return redirect()->route('department.index')->with('success', 'Department created successfully.');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
