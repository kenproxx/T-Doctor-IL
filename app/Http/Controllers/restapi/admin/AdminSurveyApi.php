<?php

namespace App\Http\Controllers\restapi\admin;

use App\Enums\DepartmentStatus;
use App\Enums\SurveyStatus;
use App\Enums\SurveyType;
use App\Http\Controllers\Controller;
use App\Http\Controllers\restapi\MainApi;
use App\Http\Controllers\restapi\SurveyApi;
use App\Models\Department;
use App\Models\SurveyAnswer;
use App\Models\SurveyQuestion;
use App\Models\Surveys;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminSurveyApi extends Controller
{
    public function getAll(Request $request)
    {
        $status = $request->input('status');
        if ($status) {
            $surveys = Surveys::orderBy('id', 'desc')->where('status', $status)->get();
        } else {
            $surveys = Surveys::orderBy('id', 'desc')->where('status', '!=', SurveyStatus::DELETED)->get();
        }
        return response()->json($surveys);
    }

    public function getAllByDepartment($id, Request $request)
    {
        $status = $request->input('status');
        $surveys = DB::table('surveys')->where('department_id', $id)->orderBy('id', 'desc')->when($status,
                function ($query) use ($status) {
                    $query->where('status', $status);
                })->where('status', '!=', SurveyStatus::DELETED)->cursor()->map(function ($item) {
                $survey = (array)$item;
                $answerFormat = (new SurveyApi())->checkTypeSurvey($item->type, $item->answer);
                $survey['answerFormat'] = $answerFormat;
                return $survey;
            });

        return response()->json($surveys);
    }

    public function detail($id)
    {
        $survey = Surveys::find($id);
        if (!$survey || $survey->status == SurveyStatus::DELETED) {
            return response((new MainApi())->returnMessage('Not found!'), 404);
        }
        return response()->json($survey);
    }

    public function create(Request $request)
    {
//        try {
//            $survey = new Surveys();
//            $survey = $this->save($request, $survey);
//            $department = Department::find($survey->department_id);
//            if (!$department || $department->status == DepartmentStatus::DELETED) {
//                return response((new MainApi())->returnMessage('Department not found!'), 400);
//            }
//            $success = $survey->save();
//            if ($success) {
//                return response()->json($survey);
//            }
//            return response((new MainApi())->returnMessage('Create error!'), 400);
//        } catch (\Exception $exception) {
//            return response((new MainApi())->returnMessage('Create error, Please try again!!!'), 400);
//        }

        try {
            $survey = new SurveyQuestion();

            $params = $request->only('question', 'question_en', 'question_laos', 'department_id', 'type');

            $department = Department::find($params['department_id']);
            if (!$department || $department->status == DepartmentStatus::DELETED) {
                return response((new MainApi())->returnMessage('Department not found!'), 400);
            }

            $survey->fill($params);
            $result = $survey->save();

            if (!$result) {
                return response((new MainApi())->returnMessage('Create error, Please try again!!!'), 400);
            }

            $surveyId = $survey->id;

            $symbol = '@#!';

            $arrAnswer_vi = explode($symbol, $request->input('answer_vi'));
            $arrAnswer_en = explode($symbol, $request->input('answer_en'));
            $arrAnswer_laos = explode($symbol, $request->input('answer_laos'));

            for ($i = 0; $i < count($arrAnswer_vi); $i++) {
                $answer = new SurveyAnswer();
                $answer->survey_question_id = $surveyId;
                $answer->answer = $arrAnswer_vi[$i];
                $answer->answer_en = $arrAnswer_en[$i];
                $answer->answer_laos = $arrAnswer_laos[$i];
                $answer->save();
            }

            return response()->json($survey);
        } catch (Exception $exception) {
            return response((new MainApi())->returnMessage('Create error, Please try again!!!'), 400);
        }

    }

    private function save($request, $survey)
    {
        $question = $request->input('question');
        $question_en = $request->input('question_en');
        $question_laos = $request->input('question_laos');

        if ($request->hasFile('thumbnail')) {
            $item = $request->file('thumbnail');
            $itemPath = $item->store('surveys', 'public');
            $thumbnail = asset('storage/'.$itemPath);
        } else {
            $thumbnail = $survey->thumbnail;
        }

        $description = $request->input('description') ?? '';
        $description_en = $request->input('description_en') ?? '';
        $description_laos = $request->input('description_laos') ?? '';

        $answer = $request->input('answer') ?? '';
        $answer_en = $request->input('answer_en') ?? '';
        $answer_laos = $request->input('answer_laos') ?? '';

        $status = $request->input('status');
        $type = $request->input('type');

        $user_id = $request->input('user_id');
        $department_id = $request->input('department_id');

        $survey->question = $question;
        $survey->question_en = $question_en;
        $survey->question_laos = $question_laos;

        $survey->description = $description;
        $survey->description_en = $description_en;
        $survey->description_laos = $description_laos;

        $survey->answer = $answer;
        $survey->answer_en = $answer_en;
        $survey->answer_laos = $answer_laos;

        $survey->thumbnail = $thumbnail;

        $survey->status = $status ?? SurveyStatus::ACTIVE;
        $survey->type = $type ?? SurveyType::BOOL;

        $survey->user_id = $user_id;
        $survey->department_id = $department_id;

        return $survey;
    }

    public function update($id, Request $request)
    {
        try {
            $survey = Surveys::find($id);
            if (!$survey || $survey->status == SurveyStatus::DELETED) {
                return response((new MainApi())->returnMessage('Not found!'), 404);
            }

            $survey = $this->save($request, $survey);
            $success = $survey->save();
            if ($success) {
                return response()->json($survey);
            }
            return response((new MainApi())->returnMessage('Update error!'), 400);
        } catch (Exception $exception) {
            return response((new MainApi())->returnMessage('Update error, Please try again!!!'), 400);
        }
    }

    public function delete($id)
    {
        try {
            $survey = Surveys::find($id);
            if (!$survey || $survey->status == SurveyStatus::DELETED) {
                return response((new MainApi())->returnMessage('Not found!'), 404);
            }
            $survey->status = SurveyStatus::DELETED;
            $success = $survey->save();
            if ($success) {
                return response((new MainApi())->returnMessage('Delete success!'), 200);
            }
            return response((new MainApi())->returnMessage('Delete error!'), 400);
        } catch (Exception $exception) {
            return response((new MainApi())->returnMessage('Delete error, Please try again!!!'), 400);
        }
    }
}
