<?php

use App\Http\Controllers\backend\BackendCouponApplyController;
use App\Http\Controllers\backend\BackendCouponController;
use App\Http\Controllers\backend\BackendQuestionController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\restapi\BookingApi;
use App\Http\Controllers\restapi\BusinessFavouriteApi;
use App\Http\Controllers\restapi\DoctorReviewApi;
use App\Http\Controllers\restapi\MedicalFavouriteApi;
use App\Http\Controllers\restapi\MessageApi;
use App\Http\Controllers\restapi\ServiceClinicApi;
use App\Http\Controllers\restapi\SocialUserApi;
use App\Http\Controllers\restapi\UserApi;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'users'], function () {
    Route::post('/update-profile', [UserApi::class, 'updateProfile'])->name('user.update.profile');
    Route::post('/change-info', [UserApi::class, 'changeInformation'])->name('user.change.information');
    Route::post('/change-email', [UserApi::class, 'changeEmail'])->name('user.change.email');
    Route::post('/change-phone', [UserApi::class, 'changePhoneNumber'])->name('user.change.phone');
    Route::post('/change-password', [UserApi::class, 'changePassword'])->name('user.change.password');
    Route::post('/change-avatar', [UserApi::class, 'changeAvt'])->name('user.change.avatar');
});

Route::group(['prefix' => 'users-social'], function () {
    Route::post('modify', [SocialUserApi::class, 'createOrEdit'])->name('user.social.update');
    Route::get('list-social/{id}', [SocialUserApi::class, 'getSocialByUserId'])->name('list-social');
});

Route::group(['prefix' => 'questions'], function () {
    Route::get('/list', [BackendQuestionController::class, 'getAll'])->name('api.backend.questions.list');
    Route::get('/user/{id}', [BackendQuestionController::class, 'getAllByUserId'])->name('api.backend.questions.user');
    Route::post('/create', [BackendQuestionController::class, 'create'])->name('api.backend.questions.create');
    Route::put('/change/{id}', [BackendQuestionController::class, 'upgradeStatus'])->name('api.backend.questions.change.status');
    Route::put('/update/{id}', [BackendQuestionController::class, 'update'])->name('api.backend.questions.update');
    Route::delete('/delete/{id}', [BackendQuestionController::class, 'delete'])->name('api.backend.questions.delete');
    Route::delete('/delete-list', [BackendQuestionController::class, 'deleteMultil'])->name('api.backend.questions.delete.list');
});

Route::group(['prefix' => 'coupons-apply'], function () {
    Route::get('/list', [BackendCouponApplyController::class, 'getAll'])->name('api.backend.coupons-apply.list');
    Route::get('/detail/{id}', [BackendCouponApplyController::class, 'detail'])->name('api.backend.coupons-apply.detail');
    Route::get('/user/{id}', [BackendCouponApplyController::class, 'getAllByUser'])->name('api.backend.coupons-apply.user');
    Route::post('/create', [BackendCouponApplyController::class, 'create'])->name('api.backend.coupons-apply.create');
    Route::put('/update/{id}', [BackendCouponApplyController::class, 'update'])->name('api.backend.coupons-apply.update');
    Route::delete('/delete/{id}', [BackendCouponApplyController::class, 'delete'])->name('api.backend.coupons-apply.delete');

    Route::post('change-status', [BackendCouponApplyController::class, 'updateStatus'])->name('api.backend.coupons-apply.update-status');
});

Route::group(['prefix' => 'coupons'], function () {
    Route::get('/list', [BackendCouponController::class, 'getAll'])->name('api.backend.coupons.list');
    Route::post('/create', [BackendCouponController::class, 'create'])->name('api.backend.coupons.create');
    Route::post('/update/{id}', [BackendCouponController::class, 'update'])->name('api.backend.coupons.update');
    Route::delete('/delete/{id}', [BackendCouponController::class, 'delete'])->name('api.backend.coupons.delete');
});

Route::group(['prefix' => 'service-clinics'], function () {
    Route::get('list', [ServiceClinicApi::class, 'getAll'])->name('api.backend.service.clinic.list');
    Route::get('list-by-clinics/{id}', [ServiceClinicApi::class, 'getAllByClinics'])->name('api.backend.service.clinic.list.clinics');
    Route::get('list-by-user/{id}', [ServiceClinicApi::class, 'getAllByUserId'])->name('api.backend.service.clinic.list.user');
    Route::get('detail/{id}', [ServiceClinicApi::class, 'detail'])->name('api.backend.service.clinic.detail');
    Route::post('create', [ServiceClinicApi::class, 'create'])->name('api.backend.service.clinic.create');
});

Route::group(['prefix' => 'business-favourites'], function () {
    Route::get('list-by-users', [BusinessFavouriteApi::class, 'getAll'])->name('api.backend.business.favourites.list');
    Route::get('list-by-business', [BusinessFavouriteApi::class, 'findByUserIdAndBusinessID'])->name('api.backend.business.favourites.business');
    Route::post('create', [BusinessFavouriteApi::class, 'create'])->name('api.backend.business.favourites.create');
    Route::delete('delete/{id}', [BusinessFavouriteApi::class, 'delete'])->name('api.backend.business.favourites.delete');
});

Route::group(['prefix' => 'medical-favourites'], function () {
    Route::get('list-by-users', [MedicalFavouriteApi::class, 'getAll'])->name('api.backend.medical.favourites.list');
    Route::get('list-by-medical', [MedicalFavouriteApi::class, 'findByUserIdAndMedicalID'])->name('api.backend.medical.favourites.medical');
    Route::post('create', [MedicalFavouriteApi::class, 'create'])->name('api.backend.medical.favourites.create');
    Route::delete('delete/{id}', [MedicalFavouriteApi::class, 'delete'])->name('api.backend.medical.favourites.delete');
    Route::post('update-wishlist', [MedicalFavouriteApi::class, 'updateWishListMedical'])->name('api.backend.medical.favourites.update.wishlist');
});

Route::group(['prefix' => 'booking'], function () {
    Route::get('/list-users/{id}/{status}', [BookingApi::class, 'getAllBookingByUserId'])->name('api.booking.list.users');
    Route::get('/list-clinics/{id}', [BookingApi::class, 'getAllBookingByClinicID'])->name('api.booking.list.clinics');
    Route::post('create', [BookingApi::class, 'createBooking'])->name('api.user.createBooking');
    Route::post('/cancel/{userId}/{bookingId}/{status}', [BookingApi::class, 'bookingCancel'])->name('api.user.booking.status');
});

Route::group(['prefix' => 'messages'], function () {
    Route::post('/create', [MessageApi::class, 'create'])->name('api.backend.messages.create');
});

Route::group(['prefix' => 'checkout'], function () {
    Route::post('imm', [\App\Http\Controllers\restapi\CheckoutApi::class, 'checkoutByImm']);
});
