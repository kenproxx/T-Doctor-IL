<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Clinic;
use App\Models\Review;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.list');
    }

    public function detail($id)
    {
        $category = Category::find($id);
        $reflector = new \ReflectionClass('App\Enums\CategoryStatus');
        $status = $reflector->getConstants();
        return view('admin.category.detail', compact('category', 'status'));
    }
}
