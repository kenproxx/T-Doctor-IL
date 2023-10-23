<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\ProductInfoController;
use Illuminate\Support\Facades\Auth;
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

Route::group(['prefix' => 'profile'], function () {
    Route::get('', 'ProfileController@index')->name('profile');
    Route::put('', 'ProfileController@update')->name('profile.update');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::group(['prefix' => 'news'], function () {
    Route::get('', [HomeController::class, 'index'])->name('index.new');
    Route::get('detail', [HomeController::class, 'detail'])->name('detail.new');
});
Route::group(['prefix' => 'recruitment'], function () {
    Route::get('/index', [\App\Http\Controllers\RecruitmentController::class, 'index'])->name('recruitment.index');
    Route::get('/apply', [\App\Http\Controllers\RecruitmentController::class, 'apply'])->name('recruitment.apply');
    Route::get('/add-cv', [\App\Http\Controllers\RecruitmentController::class, 'addCv'])->name('recruitment.add.cv');
    Route::get('/detail', [\App\Http\Controllers\RecruitmentController::class, 'detail'])->name('recruitment_detail');
    Route::get('/edit-cv', [\App\Http\Controllers\RecruitmentController::class, 'editCv'])->name('recruitment.edit.cv');
});
Route::group(['prefix' => 'examination'], function () {
    Route::get('/index', [\App\Http\Controllers\ExaminationController::class, 'index'])->name('examination.index');
    Route::get('/doctor-info', [\App\Http\Controllers\ExaminationController::class, 'infoDoctor'])->name('examination.doctor_info');
    Route::get('/best-doctor', [\App\Http\Controllers\ExaminationController::class, 'bestDoctor'])->name('examination.best_doctor');
    Route::get('/new-doctor', [\App\Http\Controllers\ExaminationController::class, 'newDoctor'])->name('examination.new_doctor');
    Route::get('/available-doctor', [\App\Http\Controllers\ExaminationController::class, 'availableDoctor'])->name('examination.available_doctor');
    Route::get('/find-my-medicine', [\App\Http\Controllers\ExaminationController::class, 'findMyMedicine'])->name('examination.findmymedicine');
    Route::get('/best-pharmacists', [\App\Http\Controllers\ExaminationController::class, 'bestPharmacists'])->name('examination.bestpharmacists');
    Route::get('/new-pharmacists', [\App\Http\Controllers\ExaminationController::class, 'newPharmacists'])->name('examination.newpharmacists');
    Route::get('/available-pharmacists', [\App\Http\Controllers\ExaminationController::class, 'availablePharmacists'])->name('examination.availablepharmacists');
    Route::get('/hot-deal-medicine', [\App\Http\Controllers\ExaminationController::class, 'hotDealMedicine'])->name('examination.hotdealmedicine');
    Route::get('/new-medicine', [\App\Http\Controllers\ExaminationController::class, 'newMedicine'])->name('examination.newmedicine');
    Route::get('/recommended', [\App\Http\Controllers\ExaminationController::class, 'recommended'])->name('examination.recommended');
    Route::get('/my-personal-doctor', [\App\Http\Controllers\ExaminationController::class, 'myPersonalDoctor'])->name('examination.mypersonaldoctor');
    Route::get('/mentoring', [\App\Http\Controllers\ExaminationController::class, 'mentoring'])->name('examination.mentoring');
});

Route::group(['prefix' => 'medicine'], function () {
    Route::get('/', [\App\Http\Controllers\MedicineController::class, 'index'])->name('medicine');
    Route::get('/detail', [\App\Http\Controllers\MedicineController::class, 'detail'])->name('medicine.detail');
    Route::get('/wish-list', [\App\Http\Controllers\MedicineController::class, 'wishList'])->name('medicine.wishList');

});
Route::group(['prefix' => 'clinic'], function () {
    Route::get('/', [\App\Http\Controllers\ClinicController::class, 'index'])->name('clinic');
    Route::get('/detail', [\App\Http\Controllers\ClinicController::class, 'detail'])->name('clinic.detail');

});

Route::group(['prefix' => 'flea-market'], function () {
    Route::get('/', [\App\Http\Controllers\FleaMarketController::class, 'index'])->name('flea-market.index');
    Route::get('wish-list', [\App\Http\Controllers\FleaMarketController::class, 'wishList'])->name('flea.market.wish.list');
    Route::get('my-store', [\App\Http\Controllers\FleaMarketController::class, 'myStore'])->name('flea.market.my.store');
    Route::get('review', [\App\Http\Controllers\FleaMarketController::class, 'review'])->name('flea.market.review');
    Route::get('sell-product', [\App\Http\Controllers\FleaMarketController::class, 'sellProduct'])->name('flea.market.sell.product');
    Route::get('edit-product', [\App\Http\Controllers\FleaMarketController::class, 'editProduct'])->name('flea.market.edit.product');
    Route::get('product-detail', [\App\Http\Controllers\FleaMarketController::class, 'productDetail'])->name('flea.market.product.detail');
});
Route::group(['prefix' => 'what-free'], function () {
    Route::get('/', [\App\Http\Controllers\WhatFreeToDay::class, 'index'])->name('what.free');
    Route::get('/to-day', [\App\Http\Controllers\WhatFreeToDay::class, 'toDay'])->name('what.free.to.day');
    Route::get('/wit-mission', [\App\Http\Controllers\WhatFreeToDay::class, 'withMission'])->name('what.free.with.mission');
    Route::get('/discounted-sevice', [\App\Http\Controllers\WhatFreeToDay::class, 'discountedSevice'])->name('what.free.discounted.service');
    Route::get('/detail', [\App\Http\Controllers\WhatFreeToDay::class, 'detail'])->name('what.free.detail');
    Route::get('/detail', [\App\Http\Controllers\WhatFreeToDay::class, 'detail'])->name('what.free.detail');
    Route::get('/campaign', [\App\Http\Controllers\WhatFreeToDay::class, 'campaign'])->name('what.free.campaign');

});

Route::middleware(['auth'])->group(function () {

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
    Route::get('/{id}', [ProductInfoController::class, 'show'])->name('product.detail');
});

// Admin
Route::group(['prefix' => 'admin', 'middleware' => 'role.admin'], function () {
    require_once __DIR__ . '/admin.php';
});

Route::group(['prefix' => 'api', 'middleware' => 'jwt'], function () {
    require_once __DIR__ . '/backend.php';
});
