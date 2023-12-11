<?php

namespace App\Http\Controllers\restapi;

use App\Enums\DoctorReviewStatus;
use App\Http\Controllers\Controller;
use App\Models\DoctorReview;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorReviewApi extends Controller
{
    public function getAll()
    {
        $reviews = DoctorReview::where('status', DoctorReviewStatus::APPROVED)
            ->orWhere('status', DoctorReviewStatus::PENDING)
            ->orderBy('id', 'desc')
            ->get();
        return response()->json($reviews);
    }

    public function getAllByDoctorID($id)
    {
        $parentReviews = DB::table('doctor_reviews')
            ->join('users', 'doctor_reviews.created_by', '=', 'users.id')
            ->where('doctor_reviews.doctor_id', $id)
            ->where('doctor_reviews.status', DoctorReviewStatus::APPROVED)
            ->orderBy('doctor_reviews.id', 'desc')
            ->select('doctor_reviews.*', 'users.username', 'users.avt')
            ->get();

        $reviews = [];
        foreach ($parentReviews as $parentReview) {
            $childReviews = DB::table('doctor_reviews')
                ->join('users', 'doctor_reviews.created_by', '=', 'users.id')
                ->where('doctor_reviews.parent_id', $parentReview->id)
                ->where('doctor_reviews.status', DoctorReviewStatus::APPROVED)
                ->orderBy('doctor_reviews.id', 'desc')
                ->select('doctor_reviews.*', 'users.username', 'users.avt')
                ->get();

            $reviews[] = [
                'parent' => $parentReview,
                'child' => $childReviews,
            ];
        }

        return response()->json($reviews);
    }

    public function getAllByUserID($id)
    {
        $reviews = DoctorReview::where('doctor_id', $id)
            ->where('status', DoctorReviewStatus::APPROVED)
            ->orWhere('status', DoctorReviewStatus::PENDING)
            ->orderBy('id', 'desc')
            ->get();
        return response()->json($reviews);
    }

    public function findById($id)
    {
        $review = DoctorReview::find($id);
        if (!$review || $review->status != DoctorReviewStatus::APPROVED) {
            return response('Doctor review not found!', 404);
        }
        return response()->json($review);
    }

    public function create(Request $request)
    {
        try {
            $review = new DoctorReview();
            $review = $this->store($request, $review);
            $success = $review->save();

            $this->calcReview($review);

            if ($success) {
                return response()->json($review);
            }
            return response('Create error!', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

    private function store($request, $review)
    {
        $title = $request->input('title');
        $title_en = $request->input('title_en');
        $title_laos = $request->input('title_laos');

        $description = $request->input('description');
        $description_en = $request->input('description_en');
        $description_laos = $request->input('description_laos');


        $number_star = $request->input('number_star');

        $created_by = $request->input('user_id');
        $doctor_id = $request->input('doctor_id');

        if (!$created_by) {
            $created_by = 0;
        }

        $parent_id = $request->input('parent_id');

        $review->title = $title;
        $review->title_en = $title_en;
        $review->title_laos = $title_laos;

        $review->description = $description;
        $review->description_en = $description_en;
        $review->description_laos = $description_laos;

        $review->number_star = $number_star;

        $review->created_by = $created_by;

        if ($parent_id) {
            $review->parent_id = $parent_id;
        } else {
            $review->doctor_id = $doctor_id;
        }

        $review->status = DoctorReviewStatus::APPROVED;

        return $review;
    }

    public function calcReview($review)
    {
        $reviews = DoctorReview::where('doctor_id', $review->doctor_id)
            ->where('status', DoctorReviewStatus::APPROVED)
            ->get();
        $totalReview = $reviews->count();
        $totalStar = $reviews->sum('number_star');
        $calcReview = ($totalReview > 0) ? ($totalStar / $totalReview) : 0;

        $user = User::find($review->doctor_id);
        $user->average_star = $calcReview;
        $user->save();
    }

    public function update(Request $request, $id)
    {
        try {
            $review = DoctorReview::find($id);
            $review = $this->store($request, $review);
            $success = $review->save();
            $this->calcReview($review);
            if ($success) {
                return response()->json($review);
            }
            return response('Create error!', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

    public function delete($id)
    {
        try {
            $review = DoctorReview::find($id);
            if (!$review || $review->status == DoctorReviewStatus::DELETED) {
                return response('Not found!', 404);
            }
            $review->status = DoctorReviewStatus::DELETED;
            $review->save();
            $this->calcReview($review);
            return response('Delete success!', 200);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }
}
