<?php

use App\Http\Controllers\backend\BackendCategoryController;
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

Route::group(['prefix' => 'categories'], function () {
    Route::get('/list', [BackendCategoryController::class, 'getAll'])->name('api.business.categories.list');
    Route::get('/detail/{id}', [BackendCategoryController::class, 'detail'])->name('api.business.categories.detail');
    Route::get('/user/{id}', [BackendCategoryController::class, 'getAllByUser'])->name('api.business.categories.user');
    Route::post('/create', [BackendCategoryController::class, 'create'])->name('api.business.categories.create');
    Route::post('/update/{id}', [BackendCategoryController::class, 'update'])->name('api.business.categories.update');
    Route::delete('/delete/{id}', [BackendCategoryController::class, 'delete'])->name('api.business.categories.delete');
});




