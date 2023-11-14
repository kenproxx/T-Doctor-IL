<?php

use App\Http\Controllers\backend\BackendCouponApplyController;
use App\Http\Controllers\restapi\SocialUserApi;
use App\Http\Controllers\restapi\UserApi;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'users'], function () {
    Route::post('/change-info', [UserApi::class, 'changeInformation'])->name('user.change.information');
    Route::post('/change-email', [UserApi::class, 'changeEmail'])->name('user.change.email');
    Route::post('/change-phone', [UserApi::class, 'changePhoneNumber'])->name('user.change.phone');
    Route::post('/change-password', [UserApi::class, 'changePassword'])->name('user.change.password');
    Route::post('/change-avatar', [UserApi::class, 'changeAvt'])->name('user.change.avatar');
});

Route::group(['prefix' => 'users-social'], function () {
    Route::post('modify', [SocialUserApi::class, 'createOrEdit'])->name('user.social.update');
});

Route::group(['prefix' => 'coupons-apply'], function () {
    Route::get('/list', [BackendCouponApplyController::class, 'getAll'])->name('api.backend.coupons-apply.list');
    Route::get('/detail/{id}', [BackendCouponApplyController::class, 'detail'])->name('api.backend.coupons-apply.detail');
    Route::get('/user/{id}', [BackendCouponApplyController::class, 'getAllByUser'])->name('api.backend.coupons-apply.user');
    Route::post('/create', [BackendCouponApplyController::class, 'create'])->name('api.backend.coupons-apply.create');
    Route::put('/update/{id}', [BackendCouponApplyController::class, 'update'])->name('api.backend.coupons-apply.update');
    Route::delete('/delete/{id}', [BackendCouponApplyController::class, 'delete'])->name('api.backend.coupons-apply.delete');
});
