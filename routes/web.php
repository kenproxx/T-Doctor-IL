<?php

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

Auth::routes();

Route::get('/login', 'AuthController@index')->name('login');

Route::group(['prefix' => 'profile'], function () {
    Route::get('', 'ProfileController@index')->name('profile');
    Route::put('', 'ProfileController@update')->name('profile.update');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::group(['prefix' => 'news'],  function () {
    Route::get('', [\App\Http\Controllers\fronend\HomeController::class,'index'])->name('index.new');
});
Route::group(['prefix' => 'recruitment'],  function () {
    Route::get('/index', [\App\Http\Controllers\RecruitmentController::class, 'index'])->name('recruitment.index');
    Route::get('/apply', [\App\Http\Controllers\RecruitmentController::class, 'apply'])->name('recruitment.apply');
    Route::get('/add-cv', [\App\Http\Controllers\RecruitmentController::class, 'addCv'])->name('recruitment.add.cv');
    Route::get('/detail', [\App\Http\Controllers\RecruitmentController::class, 'detail'])->name('recruitment_detail');
    Route::get('/edit-cv', [\App\Http\Controllers\RecruitmentController::class, 'editCv'])->name('recruitment.edit.cv');
});
Route::group(['prefix' => 'examination'], function (){
    Route::get('/index',[\App\Http\Controllers\ExaminationController::class,'index'])->name('examination.index');
    Route::get('/best-doctor', [\App\Http\Controllers\ExaminationController::class,'bestDoctor'])->name('examination.best_doctor');
    Route::get('/new-doctor', [\App\Http\Controllers\ExaminationController::class,'newDoctor'])->name('examination.new_doctor');
    Route::get('/available-doctor', [\App\Http\Controllers\ExaminationController::class,'availableDoctor'])->name('examination.available_doctor');
});

Route::group(['prefix' => 'medicine'],  function () {
    Route::get('/', [\App\Http\Controllers\MedicineController::class, 'index'])->name('medicine');
    Route::get('/detail', [\App\Http\Controllers\MedicineController::class, 'detail'])->name('medicine.detail');

});
Route::group(['prefix' => 'flea-market'], function (){
    Route::get('/',[\App\Http\Controllers\FleaMarketController::class,'index'])->name('flea-market.index');
    Route::get('product-detail',[\App\Http\Controllers\FleaMarketController::class,'productDetail'])->name('flea.market.product.detail');

});
