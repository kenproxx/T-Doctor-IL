<?php

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
