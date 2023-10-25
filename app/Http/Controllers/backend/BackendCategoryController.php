<?php

namespace App\Http\Controllers\backend;

use App\Enums\CategoryStatus;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class BackendCategoryController extends Controller
{
    public function getAll(Request $request)
    {
        $status = $request->input('status');
        if ($status) {
            $categories = Category::where('status', $status)->get();
        } else {
            $categories = Category::where('status', '!=', CategoryStatus::DELETED)->get();
        }
        return response()->json($categories);
    }

    public function create(Request $request)
    {
        try {
            $category = new Category();

            $name = $request->input('name');
            $name_en = $request->input('name_en');
            $name_laos = $request->input('name_laos');
            $description = $request->input('description');
            $description_en = $request->input('description_en');
            $parent_id = $request->input('parent_id');
            $status = $request->input('status');

            if ($parent_id) {
                $category->parent_id = $parent_id;
            }

            $category->name = $name;
            $category->name_en = $name_en;
            $category->name_laos = $name_laos;
            $category->description = $description;
            $category->description_en = $description_en;
            $category->status = $status;

            $success = $category->save();
            if ($success) {
                return response()->json($category);
            }
            return response('Create category error!', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }
}
