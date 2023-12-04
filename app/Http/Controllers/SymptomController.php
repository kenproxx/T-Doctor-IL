<?php

namespace App\Http\Controllers;

use App\Models\Symptom;
use Illuminate\Http\Request;

class SymptomController extends Controller
{
    public function index() {
        $symptoms = Symptom::all();

        return view('admin.department_symptom.lists-symptom', ['symptoms' => $symptoms]);
    }

    public function create()
    {
        return view('admin.department_symptom.create-symptom');
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
            $imagePath = $request->file('image')->store('symptoms/', 'public');
            $data['thumbnail'] = $imagePath;
        }

        Symptom::create($data);

        return redirect()->route('symptom.index')->with('success', 'Symptoms created successfully.');
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
