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
        $department = $request->input('department');
        if ($request->hasFile('image')) {
            $item = $request->file('image');
            $itemPath = $item->store('symptoms', 'public');
            $thumbnail = asset('storage/' . $itemPath);
            $symptom->thumbnail = $thumbnail;
        }

        $name = $request->input('name');
        $name_en = $request->input('name_en');
        $name_laos = $request->input('name_laos');

        if (!$name || !$name_en || !$name_laos) {
            alert()->error('Error', 'Please enter the name input!');
            return back();
        }

        $symptom->name = $name;
        $symptom->name_en = $name_en;
        $symptom->name_laos = $name_laos;

        $symptom->department_id = $department;

        $description = $request->input('description');
        $description_en = $request->input('description_en');
        $description_laos = $request->input('description_laos');

        if (!$description || !$description_en || !$description_laos) {
            alert()->error('Error', 'Please enter the description input!');
            return back();
        }

        $symptom->description = $description;
        $symptom->description_en = $description_en;
        $symptom->description_laos = $description_laos;

        $status = SymptomStatus::ACTIVE;
        $symptom->status = $status;

        $symptom->save();

        return redirect()->route('symptom.index')->with('success', 'Symptoms updated successfully.');
    }

    public function store(Request $request)
    {
        $symptom = new Symptom();

        $name = $request->input('name');
        $name_en = $request->input('name_en');
        $name_laos = $request->input('name_laos');

        if (!$name || !$name_en || !$name_laos) {
            alert()->error('Error', 'Please enter the name input!');
            return back();
        }

        if ($request->hasFile('image')) {
            $item = $request->file('image');
            $itemPath = $item->store('symptoms', 'public');
            $thumbnail = asset('storage/' . $itemPath);
            $symptom->thumbnail = $thumbnail;
        } else {
            alert()->error('Error', 'Please upload image!');
            return back();
        }

        $department = $request->input('department');

        $description = $request->input('description');
        $description_en = $request->input('description_en');
        $description_laos = $request->input('description_laos');

        if (!$description || !$description_en || !$description_laos) {
            alert()->error('Error', 'Please enter the description input!');
            return back();
        }

        $user_id = Auth::user()->id;
        $status = SymptomStatus::ACTIVE;

        $symptom->name = $name;
        $symptom->name_en = $name_en;
        $symptom->name_laos = $name_laos;

        $symptom->department_id = $department;

        $symptom->description = $description;
        $symptom->description_en = $description_en;
        $symptom->description_laos = $description_laos;

        $symptom->status = $status;
        $symptom->user_id = $user_id;

        $symptom->save();

        return redirect()->route('symptom.index')->with('success', 'Symptoms created successfully.');
    }

    public function destroy($id)
    {
    }
}
