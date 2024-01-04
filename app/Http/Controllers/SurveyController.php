<?php

namespace App\Http\Controllers;

use App\Enums\DepartmentStatus;
use App\Enums\SurveyStatus;
use App\Models\Department;
use App\Models\SurveyQuestion;
use App\Models\Surveys;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{


    public function getList()
    {
//        $isAdmin = (new MainController())->checkAdmin();
//        if ($isAdmin) {
//            $surveys = Surveys::orderBy('id', 'desc')
//                ->where('status', '!=', SurveyStatus::DELETED)
//                ->get();
//        } else {
//            $surveys = Surveys::orderBy('id', 'desc')
//                ->where('status', '!=', SurveyStatus::DELETED)
//                ->where('user_id', Auth::user()->id)
//                ->get();
//        }

        $surveys = SurveyQuestion::all();
        return view('admin.surveys.list', compact('surveys'));
    }

    public function detail($id)
    {
        $survey = Surveys::find($id);
        $survey = SurveyQuestion::find($id);

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


    public function getQuestionByDepartment($departmentId)
    {
        $questions = SurveyQuestion::where('department_id', $departmentId)
            ->with('survey_answers') // Eager load the survey_answers relationship
            ->get();
        return response()->json($questions);
    }


    public function getAnswerByUser($question_id, $user_id)
    {
        $answer = SurveyQuestion::where('id', $question_id)
            ->with(['survey_answers' => function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            }])
            ->first();
        return response()->json($answer);
    }

}
