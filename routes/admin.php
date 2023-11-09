<?php

use App\Http\Controllers\ClinicController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DoctorInfoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductInfoController;
use App\Http\Controllers\StaffController;
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

Route::get('/', [HomeController::class, 'home'])->name('homeAdmin');
Route::group(['prefix' => 'home'], function () {
    Route::get('list-products', [HomeController::class, 'listProduct'])->name('homeAdmin.list.product');
    Route::get('list-clinics', [HomeController::class, 'listClinics'])->name('homeAdmin.list.clinics');
    Route::get('list-coupon', [HomeController::class, 'listCoupon'])->name('homeAdmin.list.coupons');
    Route::get('list-doctor', [HomeController::class, 'listDoctor'])->name('homeAdmin.list.doctors');
    Route::get('list-staff', [HomeController::class, 'listStaff'])->name('homeAdmin.list.staff');
});

Route::get('/about', function () {
    return view('about');
})->name('about');




Route::group(['prefix' => 'products'], function () {
    Route::get('/detail/{id}', [ProductInfoController::class, 'show'])->name('product.detail');
    Route::get('/create', [ProductInfoController::class, 'createProduct'])->name('product.create.product');
    Route::get('/edit/{id}', [ProductInfoController::class, 'edit'])->name('product.edit');
    Route::put('/update/{id}', [ProductInfoController::class, 'update'])->name('product.update');

});

Route::group(['prefix' => 'staffs'], function () {
    Route::get('detail/{id}', [StaffController::class, 'show'])->name('staff.detail');
    Route::get('create', [StaffController::class, 'create'])->name('staff.create');
    Route::get('edit/{id}', [StaffController::class, 'edit'])->name('staff.edit');

});

Route::group(['prefix' => 'clinics'], function () {
    Route::get('/detail/{id}', [ClinicController::class, 'show'])->name('clinics.detail');
    Route::get('/create', [ClinicController::class, 'create'])->name('clinics.create.product');
    Route::get('/edit/{id}', [ClinicController::class, 'edit'])->name('clinics.edit');
    Route::put('/update/{id}', [ClinicController::class, 'update'])->name('clinics.update');

});

Route::group(['prefix' => 'coupon'], function () {
    Route::get('detail/{id}', [CouponController::class, 'show'])->name('coupon.detail');
    Route::get('create', [CouponController::class, 'create'])->name('coupon.create.product');
    Route::get('edit/{id}', [CouponController::class, 'edit'])->name('coupon.edit');
    Route::put('update/{id}', [CouponController::class, 'update'])->name('coupon.update');

});
Route::group(['prefix' => 'doctor'], function () {
    Route::get('detail/{id}', [DoctorInfoController::class, 'show'])->name('doctor.detail');
    Route::get('create', [DoctorInfoController::class, 'create'])->name('doctor.create.product');
    Route::get('edit/{id}', [DoctorInfoController::class, 'edit'])->name('doctor.edit');
    Route::put('update/{id}', [DoctorInfoController::class, 'update'])->name('doctor.update');

});


