<?php

namespace App\Http\Controllers\backend;

use App\Enums\QuestionStatus;
use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class BackendQuestionController extends Controller
{
    public function getAll(Request $request)
    {
        $status = $request->input('status');
        if ($status) {
            $questions = Question::where('status', $status)->get();
        } else {
            $questions = Question::where('status', '!=', QuestionStatus::DELETED)->get();
        }
        return response()->json($questions);
    }

    public function detail($id)
    {
        $question = Question::find($id);
        if (!$question || $question->status == QuestionStatus::DELETED) {
            return response('Not found', 404);
        }
        return response()->json($question);
    }

    public function create(Request $request)
    {
        try {
            $question = new Question();

            $content = $request->input('content');
            $content_en = $request->input('content_en');
            $content_laos = $request->input('content_laos');
            $user_id = $request->input('user_id');
            $status = $request->input('status');

            $question->content = $content;
            $question->content_en = $content_en;
            $question->content_laos = $content_laos;
            $question->user_id = $user_id;
            $question->status = $status;

            $success = $question->save();
            if ($success) {
                return response()->json($question);
            }
            return response('Create question error!', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

    public function getAllByUserId(Request $request, $id)
    {
        $status = $request->input('status');
        if ($status && $status != QuestionStatus::DELETED) {
            $clinics = Question::where([
                ['status', $status],
                ['user_id', $id]
            ])->get();
        } else {
            $clinics = Question::where([
                ['status', '!=', QuestionStatus::DELETED],
                ['user_id', $id]
            ])->get();
        }
        return response()->json($clinics);
    }

    public function upgradeStatus($id, Request $request)
    {
        try {
            $question = Question::find($id);
            if (!$question || $question->status == QuestionStatus::DELETED) {
                return response('Not found', 404);
            }

            $status = $request->input('status');
            if (!$status) {
                $status = QuestionStatus::APPROVED;
            }
            $question->status = $status;
            $success = $question->save();
            if ($success) {
                return response('Update success!', 200);
            }
            return response('Update question error!', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $question = Question::find($id);
            if (!$question || $question->status == QuestionStatus::DELETED) {
                return response('Not found', 404);
            }

            $content = $request->input('content');
            $content_en = $request->input('content_en');
            $content_laos = $request->input('content_laos');
            $user_id = $request->input('user_id');
            $status = $request->input('status');

            $question->content = $content;
            $question->content_en = $content_en;
            $question->content_laos = $content_laos;
            $question->user_id = $user_id;
            $question->status = $status;

            $success = $question->save();
            if ($success) {
                return response()->json($question);
            }
            return response('Create question error!', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

    public function delete($id)
    {
        try {
            $question = Question::find($id);
            if (!$question || $question->status == QuestionStatus::DELETED) {
                return response('Not found', 404);
            }
            $question->status = QuestionStatus::DELETED;
            $success = $question->save();
            if ($success) {
                return response('Delete success!', 200);
            }
            return response('Delete q   uestion error!', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

//    public function deleteMultil(Request $request)
//    {
//        try {
//            $listID = $request->input('listID');
//            $question = Question::whereIn('id', $listID)->get();
//            foreach ($question as $item) {
//                $item->status = QuestionStatus::DELETED;
//                $success = $item->save();
//            }
//            if ($success) {
//                return response('Delete success!', 200);
//            }
//            return response('Delete question error!', 400);
//        } catch (\Exception $exception) {
//            return response($exception, 400);
//        }
//    }

    public function custom_getlist()
    {
        $list = [];

        $listQuestion = Question::where('status', QuestionStatus::APPROVED)->get();

        foreach ($listQuestion as $question) {
            $item = [
                'id' => $question->id,
                'parent' => null,
                'content' => $question->content,
                'content_en' => $question->content_en,
                'content_laos' => $question->content_laos,
                'pings' => null,
                'attachments' => '',
                'creator' => $question->user_id,
                'created' => $question->created_at,
                'modified' => $question->updated_at,
                'fullname' => User::getNameByID($question->user_id),
                'profile_picture_url' => 'https://viima-app.s3.amazonaws.com/media/public/defaults/user-icon.png',
            ];
            array_push($list, $item);
            $listAnswer = Answer::where('question_id', $question->id)->get();
            foreach ($listAnswer as $answer) {
                $item = [
                    'id' => $answer->id,
                    'parent' => $question->id,
                    'content' => $answer->content,
                    'content_en' => $answer->content_en,
                    'content_laos' => $answer->content_laos,
                    'pings' => null,
                    'attachments' => '',
                    'creator' => $answer->user_id,
                    'created' => $answer->created_at,
                    'modified' => $answer->updated_at,
                    'fullname' => User::getNameByID($answer->user_id),
                    'profile_picture_url' => 'https://viima-app.s3.amazonaws.com/media/public/defaults/user-icon.png',
                ];
                array_push($list, $item);
            }
        }


        return response()->json($list);

    }
}
