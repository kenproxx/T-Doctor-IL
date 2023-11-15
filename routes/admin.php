<?php

use App\Http\Controllers\backend\BackendNewEventController;
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

Route::group(['prefix' => 'new-event'], function () {
    Route::get('index', [BackendNewEventController::class, 'index'])->name('api.new-event.index');
    Route::get('create', [BackendNewEventController::class, 'create'])->name('api.new-event.create');
    Route::post('store', [BackendNewEventController::class, 'store'])->name('api.new-event.store');
    Route::get('edit', [BackendNewEventController::class, 'edit'])->name('api.new-event.edit');
    Route::post('update', [BackendNewEventController::class, 'update'])->name('api.new-event.update');
    Route::post('destroy', [BackendNewEventController::class, 'destroy'])->name('api.new-event.destroy');
});



