<?php

use App\Http\Controllers\backend\BackendAnswerController;
use App\Http\Controllers\backend\BackendCouponController;
use App\Http\Controllers\restapi\CategoryApi;
use App\Http\Controllers\restapi\ClinicApi;
use App\Http\Controllers\restapi\DoctorDepartmentApi;
use App\Http\Controllers\restapi\DoctorInfoApi;
use App\Http\Controllers\restapi\PharmacyApi;
use App\Http\Controllers\restapi\ProductInfoApi;
use App\Http\Controllers\restapi\ProductMedicineApi;
use App\Http\Controllers\restapi\QrCodeApi;
use App\Http\Controllers\restapi\ReadAddressApi;
use App\Http\Controllers\restapi\ReviewApi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
|restapi Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['prefix' => 'products'], function () {
    Route::get('/list', [ProductInfoApi::class, 'index'])->name('products.api.list');
    Route::get('/category/{id}', [ProductInfoApi::class, 'getAllByCategory'])->name('products.api.category');
    Route::get('/user/{id}', [ProductInfoApi::class, 'getByUser'])->name('products.api.user');
    Route::get('/detail/{id}', [ProductInfoApi::class, 'getById'])->name('products.api.detail');
    Route::get('/clinics/{id}', [ProductInfoApi::class, 'getByClinic'])->name('products.api.clinics');
    Route::get('/search', [ProductInfoApi::class, 'search'])->name('products.api.search');
    Route::get('/department/{id}', [ProductInfoApi::class, 'findByDepartment'])->name('products.restapi.department');
});

Route::group(['prefix' => 'clinics'], function () {
    Route::get('/list', [ClinicApi::class, 'getAll'])->name('clinics.restapi.list');
    Route::get('/user/{id}', [ClinicApi::class, 'getAllByUserId'])->name('clinics.restapi.user');
    Route::get('/detail/{id}', [ClinicApi::class, 'detail'])->name('clinics.restapi.detail');
});

Route::group(['prefix' => 'pharmacies'], function () {
    Route::get('/list', [PharmacyApi::class, 'getAll'])->name('pharmacies.restapi.list');
    Route::get('/user/{id}', [PharmacyApi::class, 'getAllByUserId'])->name('pharmacies.restapi.user');
    Route::get('/detail/{id}', [PharmacyApi::class, 'detail'])->name('pharmacies.restapi.detail');
});

Route::group(['prefix' => 'doctors-info'], function () {
    Route::get('/list', [DoctorInfoApi::class, 'getAll'])->name('doctors.info.restapi.list');
    Route::get('/user/{id}', [DoctorInfoApi::class, 'findByUser'])->name('doctors.info.restapi.user');
    Route::get('/department/{id}', [DoctorInfoApi::class, 'findByDepartment'])->name('doctors.info.restapi.department');
    Route::get('/detail/{id}', [DoctorInfoApi::class, 'detail'])->name('doctors.info.restapi.detail');
    Route::get('/my-doctors/{id}', [DoctorInfoApi::class, 'getMyDoctor'])->name('doctors.info.restapi.my.doctor');
});

Route::group(['prefix' => 'doctors-departments'], function () {
    Route::get('/list', [DoctorDepartmentApi::class, 'getAll'])->name('doctors.departments.list');
    Route::get('/detail/{id}', [DoctorDepartmentApi::class, 'getById'])->name('doctors.departments.detail');
    Route::get('/user/{id}', [DoctorDepartmentApi::class, 'getAllByUserID'])->name('doctors.departments.user');
});

Route::group(['prefix' => 'api/answers'], function () {
    Route::post('/create', [BackendAnswerController::class, 'create'])->name('answers.api.create');
});

Route::group(['prefix' => 'reviews'], function () {
    Route::get('/list', [ReviewApi::class, 'getAll'])->name('reviews.api.list');
    Route::get('/clinics/{id}', [ReviewApi::class, 'getAllByClinicId'])->name('reviews.api.clinics');
    Route::get('/detail/{id}', [ReviewApi::class, 'detail'])->name('reviews.api.detail');
    Route::post('/create', [ReviewApi::class, 'create'])->name('reviews.api.create');
});

Route::group(['prefix' => 'coupons'], function () {
    Route::get('/list', [BackendCouponController::class, 'getListCouponForUser'])->name('coupons.list');
    Route::get('/detail/{id}', [BackendCouponController::class, 'detail'])->name('coupons.detail');
    Route::get('/code/{id}', [BackendCouponController::class, 'getByCode'])->name('coupons.code');
    Route::get('/user/{id}', [BackendCouponController::class, 'getAllByUserID'])->name('coupons.user');
    Route::get('/search', [BackendCouponController::class, 'search'])->name('coupons.clinic');
});

Route::group(['prefix' => 'qr-code'], function () {
    Route::post('/doctor-info', [QrCodeApi::class, 'doctorInfo'])->name('qr.code.api.show.doctor.info');
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/list', [CategoryApi::class, 'getAll'])->name('categories.list');
    Route::get('/detail/{id}', [CategoryApi::class, 'detail'])->name('categories.detail');
    Route::get('/user/{id}', [CategoryApi::class, 'getAllByUser'])->name('categories.user');
});

Route::group(['prefix' => 'address'], function () {
    Route::get('/provinces', [ReadAddressApi::class, 'getAllProvince'])->name('restapi.get.provinces');
    Route::get('/districts/{code}', [ReadAddressApi::class, 'getAllDistrictByProvinceCode'])->name('restapi.get.districts');
    Route::get('/communes/{code}', [ReadAddressApi::class, 'getAllCommuneByDistrictCode'])->name('restapi.get.communes');
});

Route::group(['prefix' => 'products-medicines'], function () {
    Route::get('/category/{id}', [ProductMedicineApi::class, 'findMedicineByCategory'])->name('restapi.get.products.medicines.category');
});

Route::get('/users/by-role/{role_id}', [\App\Http\Controllers\ProfileController::class, 'getUsersByRoleId'])->name('role.user');
