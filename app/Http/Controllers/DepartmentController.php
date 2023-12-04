<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

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
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except(['_token']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('departments/', 'public');
            $data['thumbnail'] = $imagePath;
        }

        Department::create($data);

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
