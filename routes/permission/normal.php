<?php

use App\Http\Controllers\backend\BackendAnswerController;
use App\Http\Controllers\backend\BackendCategoryController;
use App\Http\Controllers\backend\BackendClinicController;
use App\Http\Controllers\backend\BackendCouponApplyController;
use App\Http\Controllers\backend\BackendCouponController;
use App\Http\Controllers\backend\BackendProductInfoController;
use App\Http\Controllers\backend\BackendQuestionController;
use App\Http\Controllers\backend\BackendReviewController;
use App\Http\Controllers\backend\BackendWishListController;
use App\Http\Controllers\QuestionLikesController;
use App\Http\Controllers\restapi\admin\AdminDoctorInfoApi;
use App\Http\Controllers\restapi\admin\AdminPharmacyApi;
use App\Http\Controllers\restapi\UserApi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
|Normal Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'question-like'], function () {
    Route::get('is-like/{questionId}/{userId}', [QuestionLikesController::class, 'checkEmotion'])->name('api.backend.question-like.check');
    Route::post('change/{questionId}/{userId}', [QuestionLikesController::class, 'changeEmotion'])->name('api.backend.question-like.change');
});

