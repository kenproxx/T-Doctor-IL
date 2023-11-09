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
|Business Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::group(['prefix' => 'products'], function () {
//    Route::get('/list', [BackendProductInfoController::class, 'index'])->name('api.backend.products.list');
//    Route::get('/search', [BackendProductInfoController::class, 'search'])->name('api.backend.products.search');
//    Route::get('/detail/{id}', [BackendProductInfoController::class, 'show'])->name('api.backend.products.detail');
//    Route::get('/category/{id}', [BackendProductInfoController::class, 'getAllByCategory'])->name('api.backend.products.category');
//    Route::get('/user/{id}', [BackendProductInfoController::class, 'getByUser'])->name('api.backend.products.user');
//    Route::get('/clinic/{id}', [BackendProductInfoController::class, 'getByClinic'])->name('api.backend.products.clinic');
//    Route::post('/create', [BackendProductInfoController::class, 'store'])->name('api.backend.products.create');
//    Route::post('/edit/{id}', [BackendProductInfoController::class, 'update'])->name('api.backend.product.updatePost');
//    Route::put('/update/{id}', [BackendProductInfoController::class, 'update'])->name('api.backend.products.update');
//    Route::delete('/delete/{id}', [BackendProductInfoController::class, 'destroy'])->name('api.backend.products.delete');
//});
//
//Route::group(['prefix' => 'wish-lists'], function () {
//    Route::get('/list', [BackendWishListController::class, 'getAll'])->name('api.backend.wish.lists.list');
//    Route::get('/detail/{id}', [BackendWishListController::class, 'detail'])->name('api.backend.wish.lists.detail');
//    Route::post('/create', [BackendWishListController::class, 'create'])->name('api.backend.wish.lists.create');
//    Route::POST('/update/{id}', [BackendWishListController::class, 'update'])->name('api.backend.wish.lists.update');
//    Route::delete('/delete/{id}', [BackendWishListController::class, 'delete'])->name('api.backend.wish.lists.delete');
//    Route::delete('/delete-list', [BackendWishListController::class, 'deleteMultil'])->name('api.backend.wish.lists.delete.listId');
//});
//
//Route::group(['prefix' => 'clinics'], function () {
//    Route::get('/list', [BackendClinicController::class, 'getAll'])->name('api.backend.clinics.list');
//    Route::get('/user/{id}', [BackendClinicController::class, 'getAllByUserId'])->name('api.backend.clinics.user');
//    Route::get('/detail/{id}', [BackendClinicController::class, 'detail'])->name('api.backend.clinics.detail');
//    Route::post('/create', [BackendClinicController::class, 'create'])->name('api.backend.clinics.create');
//    Route::put('/update/{id}', [BackendClinicController::class, 'update'])->name('api.backend.clinics.update');
//    Route::post('/edit/{id}', [BackendClinicController::class, 'update'])->name('api.backend.clinics.edit');
//    Route::delete('/delete/{id}', [BackendClinicController::class, 'delete'])->name('api.backend.clinics.delete');
//});
//
//Route::group(['prefix' => 'pharmacies'], function () {
//    Route::get('/list', [AdminPharmacyApi::class, 'getAll'])->name('api.backend.pharmacies.list');
//    Route::get('/user/{id}', [AdminPharmacyApi::class, 'getAllByUserId'])->name('api.backend.pharmacies.user');
//    Route::get('/detail/{id}', [AdminPharmacyApi::class, 'detail'])->name('api.backend.pharmacies.detail');
//    Route::post('/create', [AdminPharmacyApi::class, 'create'])->name('api.backend.pharmacies.create');
//    Route::put('/update/{id}', [AdminPharmacyApi::class, 'update'])->name('api.backend.pharmacies.update');
//    Route::post('/edit/{id}', [AdminPharmacyApi::class, 'update'])->name('api.backend.pharmacies.edit');
//    Route::delete('/delete/{id}', [AdminPharmacyApi::class, 'delete'])->name('api.backend.pharmacies.delete');
//});
//
//Route::group(['prefix' => 'questions'], function () {
//    Route::get('/list', [BackendQuestionController::class, 'getAll'])->name('api.backend.questions.list');
//    Route::get('/user/{id}', [BackendQuestionController::class, 'getAllByUserId'])->name('api.backend.questions.user');
//    Route::get('/detail/{id}', [BackendQuestionController::class, 'detail'])->name('api.backend.questions.detail');
//    Route::post('/create', [BackendQuestionController::class, 'create'])->name('api.backend.questions.create');
//    Route::put('/change/{id}', [BackendQuestionController::class, 'upgradeStatus'])->name('api.backend.questions.change.status');
//    Route::put('/update/{id}', [BackendQuestionController::class, 'update'])->name('api.backend.questions.update');
//    Route::delete('/delete/{id}', [BackendQuestionController::class, 'delete'])->name('api.backend.questions.delete');
//    Route::delete('/delete-list', [BackendQuestionController::class, 'deleteMultil'])->name('api.backend.questions.delete.list');
//});
//
//Route::group(['prefix' => 'answers'], function () {
//    Route::get('/list', [BackendAnswerController::class, 'getAll'])->name('api.backend.answers.list');
//    Route::get('/question/{id}', [BackendAnswerController::class, 'getAllByQuestion'])->name('api.backend.answers.question');
//    Route::get('/parent/{id}', [BackendAnswerController::class, 'getAllByAnswer'])->name('api.backend.answers.parent');
//    Route::get('/detail/{id}', [BackendAnswerController::class, 'detail'])->name('api.backend.answers.detail');
////    Route::post('/create', [BackendAnswerController::class, 'create'])->name('api.backend.answers.create');
//    Route::put('/change/{id}', [BackendAnswerController::class, 'changeStatus'])->name('api.backend.answers.change.status');
//    Route::put('/update/{id}', [BackendAnswerController::class, 'update'])->name('api.backend.answers.update');
//    Route::delete('/delete/{id}', [BackendAnswerController::class, 'delete'])->name('api.backend.answers.delete');
//});
//
//Route::group(['prefix' => 'reviews'], function () {
//    Route::get('/list', [BackendReviewController::class, 'getAll'])->name('api.backend.reviews.list');
//    Route::get('/clinic/{id}', [BackendReviewController::class, 'getAllByClinicId'])->name('api.backend.reviews.clinic');
//    Route::get('/user/{id}', [BackendReviewController::class, 'getAllByUserId'])->name('api.backend.reviews.user');
//    Route::get('/all-by-user/{id}', [BackendReviewController::class, 'getAllMainUser'])->name('api.backend.reviews.all.by.user');
//    Route::get('/detail/{id}', [BackendReviewController::class, 'detail'])->name('api.backend.reviews.detail');
//    Route::post('/create', [BackendReviewController::class, 'create'])->name('api.backend.reviews.create');
//    Route::put('/change/{id}', [BackendReviewController::class, 'changeStatus'])->name('api.backend.reviews.change.status');
////    Route::put('/update/{id}', [BackendReviewController::class, 'update'])->name('api.backend.reviews.update');
//    Route::delete('/delete/{id}', [BackendReviewController::class, 'delete'])->name('api.backend.reviews.delete');
//});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/list', [BackendCategoryController::class, 'getAll'])->name('api.backend.categories.list');
    Route::get('/detail/{id}', [BackendCategoryController::class, 'detail'])->name('api.backend.categories.detail');
    Route::get('/user/{id}', [BackendCategoryController::class, 'getAllByUser'])->name('api.backend.categories.user');
//    Route::get('/clinic/{id}', [BackendCategoryController::class, 'getByClinic'])->name('api.backend.categories.clinic');
    Route::post('/create', [BackendCategoryController::class, 'create'])->name('api.backend.categories.create');
    Route::put('/update/{id}', [BackendCategoryController::class, 'update'])->name('api.backend.categories.update');
    Route::delete('/delete/{id}', [BackendCategoryController::class, 'delete'])->name('api.backend.categories.delete');
});

Route::group(['prefix' => 'coupons'], function () {
    Route::get('/list', [BackendCouponController::class, 'getAll'])->name('api.backend.coupons.list');
    Route::post('/create', [BackendCouponController::class, 'create'])->name('api.backend.coupons.create');
    Route::post('/update/{id}', [BackendCouponController::class, 'update'])->name('api.backend.coupons.update');
    Route::delete('/delete/{id}', [BackendCouponController::class, 'delete'])->name('api.backend.coupons.delete');
});

