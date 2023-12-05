<?php

use App\Http\Controllers\backend\BackendAnswerController;
use App\Http\Controllers\backend\BackendCouponController;
use App\Http\Controllers\restapi\CategoryApi;
use App\Http\Controllers\restapi\ClinicApi;
use App\Http\Controllers\restapi\DepartmentApi;
use App\Http\Controllers\restapi\DoctorDepartmentApi;
use App\Http\Controllers\restapi\DoctorInfoApi;
use App\Http\Controllers\restapi\BusinessApi;
use App\Http\Controllers\restapi\NewsApi;
use App\Http\Controllers\restapi\PharmacyApi;
use App\Http\Controllers\restapi\ProductInfoApi;
use App\Http\Controllers\restapi\ProductMedicineApi;
use App\Http\Controllers\restapi\QrCodeApi;
use App\Http\Controllers\restapi\ReadAddressApi;
use App\Http\Controllers\restapi\ReviewApi;
use App\Http\Controllers\restapi\ShortVideoApi;
use App\Http\Controllers\restapi\SymptomsApi;
use App\Http\Controllers\restapi\TopicVideoApi;
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

Route::group(['prefix' => 'medicals'], function () {
    Route::get('/list', [BusinessApi::class, 'getList'])->name('medicals.restapi.list');
});

Route::group(['prefix' => 'clinics'], function () {
    Route::get('/list', [ClinicApi::class, 'getAll'])->name('clinics.restapi.list');
    Route::get('/user/{id}', [ClinicApi::class, 'getAllByUserId'])->name('clinics.restapi.user');
    Route::get('/detail/{id}', [ClinicApi::class, 'detail'])->name('clinics.restapi.detail');
    Route::get('/filter', [ClinicApi::class, 'searchByDepartmentAndSymptoms'])->name('clinics.restapi.department.symptom');
});

Route::group(['prefix' => 'pharmacies'], function () {
    Route::get('/list', [PharmacyApi::class, 'getAll'])->name('pharmacies.restapi.list');
    Route::get('/user/{id}', [PharmacyApi::class, 'getAllByUserId'])->name('pharmacies.restapi.user');
    Route::get('/detail/{id}', [PharmacyApi::class, 'detail'])->name('pharmacies.restapi.detail');
    Route::get('/filter', [PharmacyApi::class, 'searchByDepartmentAndSymptoms'])->name('pharmacies.restapi.department.symptom');
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

Route::group(['prefix' => 'news'], function () {
    Route::get('/list', [NewsApi::class, 'getAll'])->name('news.api.list');
    Route::get('/users/{id}', [NewsApi::class, 'getAllByUserID'])->name('news.api.users');
    Route::get('/detail/{id}', [NewsApi::class, 'detail'])->name('news.api.detail');
});

Route::group(['prefix' => 'topic-videos'], function () {
    Route::get('/list', [TopicVideoApi::class, 'getAll'])->name('restapi.topic.videos.list');
    Route::get('/users/{id}', [TopicVideoApi::class, 'getAllByUserID'])->name('restapi.topic.videos.users');
    Route::get('/detail/{id}', [TopicVideoApi::class, 'detail'])->name('restapi.topic.videos.detail');
});

Route::group(['prefix' => 'short-videos'], function () {
    Route::get('/list', [ShortVideoApi::class, 'getAll'])->name('restapi.short.videos.list');
    Route::get('/users/{id}', [ShortVideoApi::class, 'getAllByUserID'])->name('restapi.short.videos.users');
    Route::get('/topics/{id}', [ShortVideoApi::class, 'getAllByTopic'])->name('restapi.short.videos.topics');
    Route::get('/detail/{id}', [ShortVideoApi::class, 'detail'])->name('restapi.short.videos.detail');
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

Route::group(['prefix' => 'departments'], function () {
    Route::get('/list', [DepartmentApi::class, 'getList'])->name('restapi.departments.list');
    Route::get('/detail/{id}', [DepartmentApi::class, 'detail'])->name('restapi.departments.detail');
});

Route::group(['prefix' => 'symptoms'], function () {
    Route::get('/list', [SymptomsApi::class, 'getList'])->name('restapi.symptoms.list');
    Route::get('/detail/{id}', [SymptomsApi::class, 'detail'])->name('restapi.symptoms.detail');
});

Route::get('/users/by-role/{role_id}', [\App\Http\Controllers\ProfileController::class, 'getUsersByRoleId'])->name('role.user');
Route::get('/service/{serviceId}', [\App\Http\Controllers\restapi\admin\AminServiceClinicApi::class, 'getServiceById'])->name('service.by.id');
