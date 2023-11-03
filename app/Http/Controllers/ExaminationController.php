<?php

namespace App\Http\Controllers;

use App\Enums\QuestionStatus;
use App\Enums\SearchMentoring;
use App\Models\Answer;
use App\Models\CalcViewQuestion;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExaminationController extends Controller
{
    public function index()
    {
        return view('examination.index');
    }
    public function infoDoctor()
    {
        return view('examination.infodoctor');
    }

    public function bestDoctor(){
        return view('examination.bestdoctor');
    }
    public function newDoctor(){
        return view('examination.newdoctor');
    }
    public function availableDoctor(){
        return view('examination.availabledoctor');
    }
    public function findMyMedicine(){
        return view('examination.findmymedicine');
    }
    public function bestPharmacists(){
        return view('examination.bestpharmacists');
    }
    public function newPharmacists(){
        return view('examination.newpharmacists');
    }
    public function availablePharmacists(){
        return view('examination.availablepharmacists');
    }
    public function hotDealMedicine(){
        return view('examination.hotdealmedicine');
    }
    public function newMedicine(){
        return view('examination.newmedicine');
    }
    public function recommended(){
        return view('examination.recommended');
    }
    public function myPersonalDoctor(){
        return view('examination.mypersonaldoctor');
    }
    public function mentoring(){
        $questions = Question::withCount('answers')
            ->where('status', QuestionStatus::APPROVED)
            ->orderBy('answers_count', 'desc') // Order by answer_count in descending order
            ->take(10)
            ->get();
        return view('examination.mentoring.mentoring', compact('questions'));
    }

    public function searchMentoring(Request $request){

        $list = [];

        $listQuestion = Question::where('status', QuestionStatus::APPROVED)->get();

        foreach ($listQuestion as $question) {

            $countAnswer = Answer::where('question_id', $question->id)->count();
            $question_id = $question->id;
            $item = [
                'id' => $question_id,
                'title' => $question->title,
                'title_en' => $question->title_en,
                'title_laos' => $question->title_laos,
                'created_at' => Carbon::parse($question->created_at)->format('H:i:s d/m/Y'),
                'modified' => $question->updated_at,
                'comment_count' => $countAnswer,
                'view_count' => CalcViewQuestion::getViewQuestion($question_id)->views ?? 0,
            ];
            array_push($list, $item);
        }

        switch ($request->input('type')) {
            case SearchMentoring::LATEST:
                usort($list, function($a, $b) {
                    return strtotime($b['created_at']) - strtotime($a['created_at']);
                });
                break;
            case SearchMentoring::MOST_VIEWS:
                usort($list, function($a, $b) {
                    return $b['view_count'] - $a['view_count'];
                });
                break;
            case SearchMentoring::MOST_COMMENTED:
                usort($list, function($a, $b) {
                    return $b['comment_count'] - $a['comment_count'];
                });
                break;
        }

        return response()->json($list);
    }
    public function createMentoring(){
        return view('examination.mentoring.create');
    }
    public function showMentoring($id){
        $question = Question::where('id', $id)->first();
        $answers = Answer::where('question_id', $id)->get();

        $calcViewQuestion = CalcViewQuestion::where('question_id', $id)->first();
        if ($calcViewQuestion) {
            $calcViewQuestion->views += 1;
        } else {
            $calcViewQuestion = new CalcViewQuestion();
            $calcViewQuestion->question_id = $id;
            $calcViewQuestion->views = 1;
        }
        $calcViewQuestion->save();

        return view('examination.mentoring.detail', compact( 'question', 'answers'));
    }

}
