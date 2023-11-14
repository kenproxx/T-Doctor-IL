<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthSocialController;
use App\Http\Controllers\backend\BackendClinicController;
use App\Http\Controllers\backend\BackendProductInfoController;
use App\Http\Controllers\backend\BackendQuestionController;
use App\Http\Controllers\CalcViewQuestionController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\DoctorInfoController;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\FleaMarketController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\ProductInfoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\WhatFreeToDay;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

Route::get('/login', 'AuthController@index')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('loginProcess');
Route::post('/register', [AuthController::class, 'register'])->name('registerProcess');
Route::get('/logout', [AuthController::class, 'logout'])->name('logoutProcess');

Route::get('/login-google', [AuthSocialController::class, 'getGoogleSignInUrl'])->name('login.google');
Route::get('/login-google-callback', [AuthSocialController::class, 'loginCallback'])->name('login.google.callback');
Route::get('/login-role', [AuthSocialController::class, 'chooseRole'])->name('login.social.choose.role');

Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::put('profile-update', [ProfileController::class, 'update'])->name('profile.update');

Route::group(['prefix' => 'news'], function () {
    Route::get('', [HomeController::class, 'index'])->name('index.new');
    Route::get('detail', [HomeController::class, 'detail'])->name('detail.new');
});
Route::group(['prefix' => 'recruitment'], function () {
    Route::get('/index', [RecruitmentController::class, 'index'])->name('recruitment.index');
    Route::get('/apply', [RecruitmentController::class, 'apply'])->name('recruitment.apply');
    Route::get('/add-cv', [RecruitmentController::class, 'addCv'])->name('recruitment.add.cv');
    Route::get('/detail', [RecruitmentController::class, 'detail'])->name('recruitment_detail');
    Route::get('/edit-cv', [RecruitmentController::class, 'editCv'])->name('recruitment.edit.cv');
});
Route::group(['prefix' => 'examination'], function () {
    Route::get('/index', [ExaminationController::class, 'index'])->name('examination.index');
    Route::get('/doctor-info', [ExaminationController::class, 'infoDoctor'])->name('examination.doctor_info');
    Route::get('/best-doctor', [ExaminationController::class, 'bestDoctor'])->name('examination.best_doctor');
    Route::get('/new-doctor', [ExaminationController::class, 'newDoctor'])->name('examination.new_doctor');
    Route::get('/available-doctor', [ExaminationController::class, 'availableDoctor'])->name('examination.available_doctor');
    Route::get('/find-my-medicine', [ExaminationController::class, 'findMyMedicine'])->name('examination.findmymedicine');
    Route::get('/best-pharmacists', [ExaminationController::class, 'bestPharmacists'])->name('examination.bestpharmacists');
    Route::get('/new-pharmacists', [ExaminationController::class, 'newPharmacists'])->name('examination.newpharmacists');
    Route::get('/available-pharmacists', [ExaminationController::class, 'availablePharmacists'])->name('examination.availablepharmacists');
    Route::get('/hot-deal-medicine', [ExaminationController::class, 'hotDealMedicine'])->name('examination.hotdealmedicine');
    Route::get('/new-medicine', [ExaminationController::class, 'newMedicine'])->name('examination.newmedicine');
    Route::get('/recommended', [ExaminationController::class, 'recommended'])->name('examination.recommended');
    Route::get('/my-personal-doctor', [ExaminationController::class, 'myPersonalDoctor'])->name('examination.mypersonaldoctor');
});

Route::group(['prefix' => 'questions'], function () {
    Route::get('/get-list', [BackendQuestionController::class, 'custom_getlist'])->name('questions.custome.list');
});
Route::group(['prefix' => 'mentoring'], function () {
    Route::get('', [ExaminationController::class, 'mentoring'])->name('examination.mentoring');
    Route::get('detail/{id}', [ExaminationController::class, 'showMentoring'])->name('examination.mentoring.show');
    Route::post('search', [ExaminationController::class, 'searchMentoring'])->name('examination.mentoring.search');
    Route::get('/ask-a-question', [ExaminationController::class, 'createMentoring'])->name('examination.mentoring.create');
    Route::get('/calc-view-comment/{id}', [CalcViewQuestionController::class, 'calcView'])->name('examination.mentoring.calc.view');
});

Route::group(['prefix' => 'medicine'], function () {
    Route::get('/', [MedicineController::class, 'index'])->name('medicine');
    Route::get('/detail', [MedicineController::class, 'detail'])->name('medicine.detail');
    Route::get('/wish-list', [MedicineController::class, 'wishList'])->name('medicine.wishList');

});

Route::group(['prefix' => 'clinic'], function () {
    Route::get('/', [ClinicController::class, 'index'])->name('clinic');
    Route::get('/detail/{id}', [ClinicController::class, 'detail'])->name('clinic.detail');
    Route::post('/create', [ClinicController::class, 'store'])->name('clinic.booking.store');
//    Route::get('/booking/{id}', [ClinicController::class, 'booking'])->name('clinic.booking');
//    Route::get('/booking-service/{id}', [ClinicController::class, 'bookingService'])->name('clinic.booking.service');
//    Route::get('/select-date/{id}', [ClinicController::class, 'selectDate'])->name('clinic.booking.select.date');

});
Route::group(['prefix' => 'product'], function () {
    Route::get('/lists', [BackendProductInfoController::class, 'index'])->name('backend.products.list');
    Route::get('/search', [BackendProductInfoController::class, 'search'])->name('backend.products.search');


});

Route::group(['prefix' => 'flea-market'], function () {
    Route::get('/', [FleaMarketController::class, 'index'])->name('flea-market.index');
    Route::get('wish-list-flea-market', [FleaMarketController::class, 'wishList'])->name('flea.market.wish.list');
    Route::get('my-store', [FleaMarketController::class, 'myStore'])->name('flea.market.my.store');
    Route::get('review', [FleaMarketController::class, 'review'])->name('flea.market.review');
    Route::get('sell-product', [FleaMarketController::class, 'sellProduct'])->name('flea.market.sell.product');
    Route::get('edit-product/{id}', [FleaMarketController::class, 'editProduct'])->name('flea.market.edit.product');
    Route::get('product-detail/{id}', [FleaMarketController::class, 'productDetail'])->name('flea.market.product.detail');
    Route::get('shop-info/{id}', [FleaMarketController::class, 'ShopInfo'])->name('flea.market.product.shop.info');
});
Route::group(['prefix' => 'what-free'], function () {
    Route::get('/', [WhatFreeToDay::class, 'index'])->name('what.free');
    Route::get('/to-day', [WhatFreeToDay::class, 'toDay'])->name('what.free.to.day');
    Route::get('/wit-mission', [WhatFreeToDay::class, 'withMission'])->name('what.free.with.mission');
    Route::get('/discounted-sevice', [WhatFreeToDay::class, 'discountedSevice'])->name('what.free.discounted.service');
    Route::get('/detail/{id}', [WhatFreeToDay::class, 'detail'])->name('what.free.detail');
    Route::get('/campaign', [WhatFreeToDay::class, 'campaign'])->name('what.free.campaign');

});

Route::middleware(['auth'])->group(function () {
    Route::post('/save-user-login-social', [AuthSocialController::class, 'saveUser'])->name('save.user.login.social');
});
Route::group(['middleware' => ['medical']], function () {
    Route::get('/admin', [\App\Http\Controllers\HomeController::class, 'home'])->name('homeAdmin');
});

// QrCode
Route::group(['prefix' => 'qr-code'], function () {
    Route::get('/doctor-info', [DoctorInfoController::class, 'showFromQrCode'])->name('qr.code.show.doctor.info');
});

/* List Api*/
//Auth
Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [LoginController::class, 'login'])->name('api.user.login');
    Route::post('/register', [RegisterController::class, 'register'])->name('api.user.register');
});
//Product
Route::group(['prefix' => 'products'], function () {
    Route::get('', [ProductInfoController::class, 'index'])->name('product.list');

});

/* Admin */
Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
    require_once __DIR__ . '/admin.php';
});

/* Business */
Route::group(['prefix' => 'api', 'middleware' => ['business']], function () {
    require_once __DIR__ . '/permission/business.php';
});

/* Medical */
Route::group(['prefix' => 'api', 'middleware' => ['medical']], function () {
    require_once __DIR__ . '/permission/medical.php';
});

/* Normal */
Route::group(['prefix' => 'api', 'middleware' => 'normal'], function () {
    require_once __DIR__ . '/permission/normal.php';
});

/* Authenticate */
Route::group(['prefix' => 'api', 'middleware' => 'jwt'], function () {
    require_once __DIR__ . '/backend.php';
});

/* Free api */
Route::group(['prefix' => ''], function () {
    require_once __DIR__ . '/restapi.php';
});

// Route maps
Route::get('explore', [\App\Http\Controllers\MapController::class, 'explore'])->name('explore.list');
