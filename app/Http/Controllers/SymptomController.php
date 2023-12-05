<?php

namespace App\Http\Controllers;

use App\Enums\DepartmentStatus;
use App\Enums\SymptomStatus;
use App\Models\Department;
use App\Models\Symptom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SymptomController extends Controller
{
    public function index()
    {
        $symptoms = Symptom::where('status', SymptomStatus::ACTIVE)->get();
        return view('admin.department_symptom.lists-symptom', ['symptoms' => $symptoms]);
    }

    public function create()
    {
        $departments = Department::where('status', DepartmentStatus::ACTIVE)->get();
        return view('admin.department_symptom.create-symptom', compact('departments'));
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $symptom = Symptom::find($id);
        $departments = Department::where('status', DepartmentStatus::ACTIVE)->get();
        return view('admin.department_symptom.edit-symptom', compact('symptom', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $symptom = Symptom::find($id);
        if ($request->hasFile('image')) {
            $item = $request->file('image');
            $itemPath = $item->store('symptoms', 'public');
            $thumbnail = asset('storage/' . $itemPath);
        } else {
            $thumbnail = $symptom->thumbnail;
        }
        $name = $request->input('name');
        $department = $request->input('department');
        $description = $request->input('description');

        $status = SymptomStatus::ACTIVE;

        $symptom->name = $name;
        $symptom->department_id = $department;
        $symptom->thumbnail = $thumbnail;
        $symptom->description = $description;
        $symptom->status = $status;

        $symptom->save();

        return redirect()->route('symptom.index')->with('success', 'Symptoms updated successfully.');
    }

    public function store(Request $request)
    {
        $symptom = new Symptom();
        if ($request->hasFile('image')) {
            $item = $request->file('image');
            $itemPath = $item->store('symptoms', 'public');
            $thumbnail = asset('storage/' . $itemPath);
        } else {
            $thumbnail = $symptom->thumbnail;
        }
        $name = $request->input('name');
        $department = $request->input('department');
        $description = $request->input('description');

        $user_id = Auth::user()->id;
        $status = SymptomStatus::ACTIVE;

        $symptom->name = $name;
        $symptom->department_id = $department;
        $symptom->thumbnail = $thumbnail;
        $symptom->description = $description;
        $symptom->status = $status;
        $symptom->user_id = $user_id;

        $symptom->save();

        return redirect()->route('symptom.index')->with('success', 'Symptoms created successfully.');
    }

    public function destroy($id)
    {
    }
}
