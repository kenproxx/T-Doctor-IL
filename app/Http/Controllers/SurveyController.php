<?php

namespace App\Http\Controllers;

use App\Enums\DepartmentStatus;
use App\Enums\SurveyStatus;
use App\Models\Department;
use App\Models\Surveys;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    public function getList()
    {
        $isAdmin = (new MainController())->checkAdmin();
        if ($isAdmin) {
            $surveys = Surveys::orderBy('id', 'desc')
                ->where('status', '!=', SurveyStatus::DELETED)
                ->get();
        } else {
            $surveys = Surveys::orderBy('id', 'desc')
                ->where('status', '!=', SurveyStatus::DELETED)
                ->where('user_id', Auth::user()->id)
                ->get();
        }
        return view('admin.surveys.list', compact('surveys'));
    }

    public function detail($id)
    {
        $survey = Surveys::find($id);
        if (!$survey || $survey->status == SurveyStatus::DELETED) {
            alert()->error('Survey not found!');
            return back();
        }
        $departments = Department::where('status', '!=', DepartmentStatus::DELETED)
            ->orderBy('id', 'desc')
            ->get();
        $reflector = new \ReflectionClass('App\Enums\SurveyType');
        $types = $reflector->getConstants();
        return view('admin.surveys.detail', compact('survey', 'departments', 'types'));
    }

    public function create()
    {
        $departments = Department::where('status', '!=', DepartmentStatus::DELETED)
            ->orderBy('id', 'desc')
            ->get();
        $reflector = new \ReflectionClass('App\Enums\SurveyType');
        $types = $reflector->getConstants();
        return view('admin.surveys.create', compact('departments', 'types'));
    }
}
