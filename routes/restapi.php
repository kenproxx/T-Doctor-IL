<?php

use App\Http\Controllers\backend\BackendAnswerController;
use App\Http\Controllers\backend\BackendCouponController;
use App\Http\Controllers\restapi\ClinicApi;
use App\Http\Controllers\restapi\DoctorInfoApi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
|restapi Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'clinics'], function () {
    Route::get('/list', [ClinicApi::class, 'getAll'])->name('clinics.restapi.list');
    Route::get('/user/{id}', [ClinicApi::class, 'getAllByUserId'])->name('clinics.restapi.user');
    Route::get('/detail/{id}', [ClinicApi::class, 'detail'])->name('clinics.restapi.detail');
});

Route::group(['prefix' => 'doctors-info'], function () {
    Route::get('/list', [DoctorInfoApi::class, 'getAll'])->name('doctors.info.restapi.list');
    Route::get('/user/{id}', [DoctorInfoApi::class, 'findByUser'])->name('doctors.info.restapi.user');
    Route::get('/detail/{id}', [DoctorInfoApi::class, 'detail'])->name('doctors.info.restapi.detail');
});

Route::group(['prefix' => 'api/answers'], function () {
    Route::post('/create', [BackendAnswerController::class, 'create'])->name('answers.api.create');
});

Route::group(['prefix' => 'coupons'], function () {
    Route::get('/list', [BackendCouponController::class, 'getAll'])->name('api.backend.coupons.list');
    Route::get('/detail/{id}', [BackendCouponController::class, 'detail'])->name('api.backend.coupons.detail');
    Route::get('/code/{id}', [BackendCouponController::class, 'getByCode'])->name('api.backend.coupons.code');
    Route::get('/user/{id}', [BackendCouponController::class, 'getAllByUserID'])->name('api.backend.coupons.user');
    Route::get('/search', [BackendCouponController::class, 'search'])->name('api.backend.coupons.clinic');
});
