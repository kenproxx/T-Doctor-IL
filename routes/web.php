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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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

Route::get('/recruitment', [\App\Http\Controllers\RecruitmentController::class, 'index'])->name('index.recruitment');
