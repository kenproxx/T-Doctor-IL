<?php

namespace App\Http\Controllers\restapi;

use App\Enums\SurveyStatus;
use App\Http\Controllers\Controller;
use App\Models\Surveys;

class SurveyApi extends Controller
{
    public function getAllByDepartment($id)
    {
        $surveys = Surveys::where('department_id', $id)
            ->where('status', SurveyStatus::ACTIVE)
            ->orderBy('id', 'desc')
            ->get();
        return response()->json($surveys);
    }

    public function detail($id)
    {
        $survey = Surveys::find($id);
        if (!$survey || $survey->status != SurveyStatus::ACTIVE) {
            return response((new MainApi())->returnMessage('Not found!'), 400);
        }
        return response()->json($survey);
    }
}
