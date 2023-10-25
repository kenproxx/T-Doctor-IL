<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\ProductInfoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
|admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'HomeController@home')->name('homeAdmin');
Route::group(['prefix' => 'home'], function () {
    Route::get('/list-products', 'HomeController@listProduct')->name('homeAdmin.list.product');
    Route::get('/list-clinics', 'HomeController@listClinics')->name('homeAdmin.list.clinics');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::group(['prefix' => 'profile'], function () {
    Route::get('', 'ProfileController@index')->name('profile');
    Route::put('', 'ProfileController@update')->name('profile.update');
});



Route::group(['prefix' => 'products'], function () {
    Route::get('/detail/{id}', [ProductInfoController::class, 'show'])->name('product.detail');
    Route::get('/create', [ProductInfoController::class, 'createProduct'])->name('product.create.product');
    Route::get('/edit/{id}', [ProductInfoController::class, 'edit'])->name('product.edit');
    Route::put('/update/{id}', [ProductInfoController::class, 'update'])->name('product.update');

});

Route::group(['prefix' => 'clinics'], function () {
    Route::get('/detail/{id}', [ClinicController::class, 'show'])->name('clinics.detail');
    Route::get('/create', [ClinicController::class, 'create'])->name('clinics.create.product');
    Route::get('/edit/{id}', [ClinicController::class, 'edit'])->name('clinics.edit');
    Route::put('/update/{id}', [ClinicController::class, 'update'])->name('clinics.update');

});


