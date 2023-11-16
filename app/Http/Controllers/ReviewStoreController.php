<?php

namespace App\Http\Controllers;

use App\Enums\ReviewStoreStatus;
use App\Models\ReviewStore;
use Illuminate\Http\Request;

class ReviewStoreController extends Controller
{
    public function ReviewStore()
    {
        $reviewStore = ReviewStore::where('status', ReviewStoreStatus::APPROVED)->get();
        return view('component.review-item', compact('reviewStore'));
    }

    public function createReviewStore()
    {
        return view('FleaMarket.tab-create-review-store');
    }
    public function createReview(Request $request, $id)
    {
        $cmt_review = $request->input('cmt_review');
        $star_number = $request->input('star_number');




        $cmt_store = new ReviewStore();
        $cmt_store->star_number = $star_number;
        $cmt_store->content = $cmt_review;
        $cmt_store->user_id = auth()->user()->id;
        $cmt_store->store_id = $id;
        $cmt_store->status = ReviewStoreStatus::APPROVED;
        $cmt_store->save();
        return redirect()->route('flea.market.product.shop.info', $id)->with('success', 'Đã gửi đánh giá thành công');

    }
}
