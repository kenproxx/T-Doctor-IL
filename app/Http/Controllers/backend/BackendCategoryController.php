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

    public function getAllByUser(Request $request, $id)
    {
        $status = $request->input('status');
        if ($status) {
            $categories = Category::where('status', $status)->where('user_id', $id)->get();
        } else {
            $categories = Category::where('status', '!=', CategoryStatus::DELETED)->where('user_id', $id)->get();
        }
        return response()->json($categories);
    }

    public function detail($id)
    {
        $category = Category::find($id);
        if (!$category || $category->status == CategoryStatus::DELETED) {
            return response('Not found', 404);
        }
        return response()->json($category);
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
            $user_id = $request->input('user_id');

            if ($parent_id) {
                $category->parent_id = $parent_id;
            }

            $category->name = $name;
            $category->name_en = $name_en;
            $category->name_laos = $name_laos;
            $category->description = $description;
            $category->description_en = $description_en;
            $category->status = $status;
            $category->user_id = $user_id;

            $success = $category->save();
            if ($success) {
                return response()->json($category);
            }
            return response('Create category error!', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $category = Category::find($id);
            if (!$category || $category->status == CategoryStatus::DELETED) {
                return response('Not found', 404);
            }

            $name = $request->input('name');
            $name_en = $request->input('name_en');
            $name_laos = $request->input('name_laos');
            $description = $request->input('description');
            $description_en = $request->input('description_en');
            $parent_id = $request->input('parent_id');
            $status = $request->input('status');
            $user_id = $request->input('user_id');

            if ($parent_id) {
                $category->parent_id = $parent_id;
            }

            $category->name = $name;
            $category->name_en = $name_en;
            $category->name_laos = $name_laos;
            $category->description = $description;
            $category->description_en = $description_en;
            $category->status = $status;
            $category->user_id = $user_id;

            $success = $category->save();
            if ($success) {
                return response()->json($category);
            }
            return response('Update category error!', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

    public function delete($id)
    {
        try {
            $category = Category::find($id);
            if (!$category || $category->status == CategoryStatus::DELETED) {
                return response('Not found', 404);
            }
            $category->status = CategoryStatus::DELETED;
            $success = $category->save();
            if ($success) {
                return response('Delete success!', 200);
            }
            return response('Delete category error!', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }
}
