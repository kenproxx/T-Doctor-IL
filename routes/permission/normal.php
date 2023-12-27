<?php

use App\Http\Controllers\FamilyManagementController;
use App\Http\Controllers\QuestionLikesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
|Normal Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'question-like'], function () {
    Route::get('is-like/{questionId}/{userId}',
        [QuestionLikesController::class, 'checkEmotion'])->name('api.backend.question-like.check');
    Route::post('change/{questionId}/{userId}',
        [QuestionLikesController::class, 'changeEmotion'])->name('api.backend.question-like.change');
});

Route::group(['prefix' => 'family-managementt'], function () {
    Route::get('index', [FamilyManagementController::class, 'index'])->name('api.backend.family-management.index');
    Route::get('create', [FamilyManagementController::class, 'create'])->name('api.backend.family-management.create');
    Route::get('addMember', [FamilyManagementController::class, 'addMember'])->name('api.backend.family-management.addMember');
    Route::post('store/{type}', [FamilyManagementController::class, 'store'])->name('api.backend.family-management.store');
    Route::get('edit/{id}', [FamilyManagementController::class, 'edit'])->name('api.backend.family-management.edit');
    Route::post('update/{id}', [FamilyManagementController::class, 'update'])->name('api.backend.family-management.update');
    Route::post('destroy/{id}',
        [FamilyManagementController::class, 'destroy'])->name('api.backend.family-management.destroy');
});

Route::group(['prefix' => 'family-management'], function () {
    Route::get('index/{current_user_id}', [FamilyManagementController::class, 'indexApi']);
    Route::post('create/{current_user_id}', [FamilyManagementController::class, 'createApi']);
    Route::post('store/{current_user_id}', [FamilyManagementController::class, 'storeApi']);
    Route::put('update/{id}', [FamilyManagementController::class, 'updateApi']);
    Route::delete('destroy/{id}', [FamilyManagementController::class, 'destroyApi']);
});
