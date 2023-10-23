<?php

use App\Http\Controllers\backend\BackendProductInfoController;
use App\Http\Controllers\backend\BackendWishListController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'products'], function () {
    Route::get('/list', [BackendProductInfoController::class, 'index'])->name('api.backend.products.list');
    Route::get('/detail/{id}', [BackendProductInfoController::class, 'show'])->name('api.backend.products.detail');
    Route::post('/create', [BackendProductInfoController::class, 'store'])->name('api.backend.products.create');
    Route::put('/update/{id}', [BackendProductInfoController::class, 'update'])->name('api.backend.products.update');
    Route::delete('/delete/{id}', [BackendProductInfoController::class, 'destroy'])->name('api.backend.products.delete');
});

Route::group(['prefix' => 'wish-lists'], function () {
    Route::get('/list', [BackendWishListController::class, 'getAll'])->name('api.backend.wish.lists.list');
    Route::get('/detail/{id}', [BackendWishListController::class, 'detail'])->name('api.backend.wish.lists.detail');
    Route::post('/create', [BackendWishListController::class, 'create'])->name('api.backend.wish.lists.create');
    Route::delete('/delete/{id}', [BackendWishListController::class, 'delete'])->name('api.backend.wish.lists.delete');
    Route::delete('/delete-list', [BackendWishListController::class, 'deleteMultil'])->name('api.backend.wish.lists.delete.listId');
});
