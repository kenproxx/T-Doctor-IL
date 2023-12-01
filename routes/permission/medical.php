<?php


use App\Http\Controllers\backend\BackendAccountRegisterController;
use App\Http\Controllers\backend\BackendAnswerController;
use App\Http\Controllers\backend\BackendCategoryProductController;
use App\Http\Controllers\backend\BackendClinicController;
use App\Http\Controllers\backend\BackendProductInfoController;
use App\Http\Controllers\backend\BackendProductMedicineController;
use App\Http\Controllers\backend\BackendQuestionController;
use App\Http\Controllers\backend\BackendReviewController;
use App\Http\Controllers\backend\BackendServiceClinicController;
use App\Http\Controllers\backend\BackendStaffController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DoctorInfoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductInfoController;
use App\Http\Controllers\restapi\admin\AdminBookingApi;
use App\Http\Controllers\restapi\admin\AdminDoctorDepartmentApi;
use App\Http\Controllers\restapi\admin\AdminDoctorInfoApi;
use App\Http\Controllers\restapi\admin\AdminNewsApi;
use App\Http\Controllers\restapi\admin\AdminPhamacitisApi;
use App\Http\Controllers\restapi\admin\AdminPharmacyApi;
use App\Http\Controllers\restapi\admin\AdminShortVideoApi;
use App\Http\Controllers\restapi\CartApi;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
|Medical Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['prefix' => 'home'], function () {
    Route::get('list-products', [HomeController::class, 'listProduct'])->name('homeAdmin.list.product');
    Route::get('list-clinics', [HomeController::class, 'listClinics'])->name('homeAdmin.list.clinics');
    Route::get('list-coupon', [HomeController::class, 'listCoupon'])->name('homeAdmin.list.coupons');
    Route::get('list-apply-coupon/{id}', [HomeController::class, 'listApplyCoupon'])->name('homeAdmin.list.apply.coupons');
    Route::get('list-doctor', [HomeController::class, 'listDoctor'])->name('homeAdmin.list.doctors');
    Route::get('list-staff', [HomeController::class, 'listStaff'])->name('homeAdmin.list.staff');
    Route::get('list-config', [HomeController::class, 'listConfig'])->name('homeAdmin.list.config');
    Route::get('list-booking', [HomeController::class, 'listBooking'])->name('homeAdmin.list.booking');
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

Route::group(['prefix' => 'products'], function () {
    Route::get('/list', [BackendProductInfoController::class, 'index'])->name('api.backend.products.list');
    Route::get('/search', [BackendProductInfoController::class, 'search'])->name('api.backend.products.search');
    Route::get('/detail/{id}', [BackendProductInfoController::class, 'show'])->name('api.backend.products.detail');
    Route::get('/category/{id}', [BackendProductInfoController::class, 'getAllByCategory'])->name('api.backend.products.category');
    Route::get('/user/{id}', [BackendProductInfoController::class, 'getByUser'])->name('api.backend.products.user');
    Route::get('/clinic/{id}', [BackendProductInfoController::class, 'getByClinic'])->name('api.backend.products.clinic');
    Route::post('/create', [BackendProductInfoController::class, 'store'])->name('api.backend.products.create');
    Route::post('/edit/{id}', [BackendProductInfoController::class, 'update'])->name('api.backend.product.updatePost');
    Route::put('/update/{id}', [BackendProductInfoController::class, 'update'])->name('api.backend.products.update');
    Route::delete('/delete/{id}', [BackendProductInfoController::class, 'destroy'])->name('api.backend.products.delete');
});

Route::group(['prefix' => 'staffs'], function () {
    Route::get('/list', [BackendStaffController::class, 'index'])->name('api.backend.staffs.list');
    Route::get('/detail/{id}', [BackendStaffController::class, 'show'])->name('api.backend.staffs.detail');
    Route::post('/store', [BackendStaffController::class, 'store'])->name('api.backend.staffs.store');
    Route::post('/update/{id}', [BackendStaffController::class, 'update'])->name('api.backend.staffs.update');
    Route::post('/delete/{id}', [BackendStaffController::class, 'destroy'])->name('api.backend.staffs.delete');
});

//Route::group(['prefix' => 'wish-lists'], function () {
//    Route::get('/list', [BackendWishListController::class, 'getAll'])->name('api.backend.wish.lists.list');
//    Route::get('/detail/{id}', [BackendWishListController::class, 'detail'])->name('api.backend.wish.lists.detail');
//    Route::post('/create', [BackendWishListController::class, 'create'])->name('api.backend.wish.lists.create');
//    Route::POST('/update/{id}', [BackendWishListController::class, 'update'])->name('api.backend.wish.lists.update');
//    Route::delete('/delete/{id}', [BackendWishListController::class, 'delete'])->name('api.backend.wish.lists.delete');
//    Route::delete('/delete-list', [BackendWishListController::class, 'deleteMultil'])->name('api.backend.wish.lists.delete.listId');
//});

Route::group(['prefix' => 'clinics'], function () {
    Route::get('/list', [BackendClinicController::class, 'getAll'])->name('api.backend.clinics.list');
    Route::get('/all-clinic-active', [BackendClinicController::class, 'getAllClinicActive'])->name('api.backend.clinics.all-clinic-active');
    Route::get('/user/{id}', [BackendClinicController::class, 'getAllByUserId'])->name('api.backend.clinics.user');
    Route::get('/detail/{id}', [BackendClinicController::class, 'detail'])->name('api.backend.clinics.detail');
    Route::post('/create', [BackendClinicController::class, 'create'])->name('api.backend.clinics.create');
    Route::put('/update/{id}', [BackendClinicController::class, 'update'])->name('api.backend.clinics.update');
    Route::post('/edit/{id}', [BackendClinicController::class, 'update'])->name('api.backend.clinics.edit');
    Route::delete('/delete/{id}', [BackendClinicController::class, 'delete'])->name('api.backend.clinics.delete');
});

Route::group(['prefix' => 'pharmacies'], function () {
    Route::get('/list', [AdminPharmacyApi::class, 'getAll'])->name('api.backend.pharmacies.list');
    Route::get('/user/{id}', [AdminPharmacyApi::class, 'getAllByUserId'])->name('api.backend.pharmacies.user');
    Route::get('/detail/{id}', [AdminPharmacyApi::class, 'detail'])->name('api.backend.pharmacies.detail');
    Route::post('/create', [AdminPharmacyApi::class, 'create'])->name('api.backend.pharmacies.create');
    Route::put('/update/{id}', [AdminPharmacyApi::class, 'update'])->name('api.backend.pharmacies.update');
    Route::post('/edit/{id}', [AdminPharmacyApi::class, 'update'])->name('api.backend.pharmacies.edit');
    Route::delete('/delete/{id}', [AdminPharmacyApi::class, 'delete'])->name('api.backend.pharmacies.delete');
});

Route::group(['prefix' => 'pharmacy'], function () {
    Route::get('/list', [AdminPharmacyApi::class, 'getAllPharmacy'])->name('api.backend.pharmacy.list');
});

Route::group(['prefix' => 'questions'], function () {
    Route::get('/list', [BackendQuestionController::class, 'getAll'])->name('api.backend.questions.list');
    Route::get('/user/{id}', [BackendQuestionController::class, 'getAllByUserId'])->name('api.backend.questions.user');
//    Route::get('/detail/{id}', [BackendQuestionController::class, 'detail'])->name('api.backend.questions.detail');
    Route::post('/create', [BackendQuestionController::class, 'create'])->name('api.backend.questions.create');
    Route::put('/change/{id}', [BackendQuestionController::class, 'upgradeStatus'])->name('api.backend.questions.change.status');
    Route::put('/update/{id}', [BackendQuestionController::class, 'update'])->name('api.backend.questions.update');
    Route::delete('/delete/{id}', [BackendQuestionController::class, 'delete'])->name('api.backend.questions.delete');
    Route::delete('/delete-list', [BackendQuestionController::class, 'deleteMultil'])->name('api.backend.questions.delete.list');
});

Route::group(['prefix' => 'answers'], function () {
    Route::get('/list', [BackendAnswerController::class, 'getAll'])->name('api.backend.answers.list');
    Route::get('/question/{id}', [BackendAnswerController::class, 'getAllByQuestion'])->name('api.backend.answers.question');
    Route::get('/parent/{id}', [BackendAnswerController::class, 'getAllByAnswer'])->name('api.backend.answers.parent');
    Route::get('/detail/{id}', [BackendAnswerController::class, 'detail'])->name('api.backend.answers.detail');
//    Route::post('/create', [BackendAnswerController::class, 'create'])->name('api.backend.answers.create');
    Route::put('/change/{id}', [BackendAnswerController::class, 'changeStatus'])->name('api.backend.answers.change.status');
    Route::put('/update/{id}', [BackendAnswerController::class, 'update'])->name('api.backend.answers.update');
    Route::delete('/delete/{id}', [BackendAnswerController::class, 'delete'])->name('api.backend.answers.delete');
});

Route::group(['prefix' => 'reviews'], function () {
    Route::get('/list', [BackendReviewController::class, 'getAll'])->name('api.backend.reviews.list');
    Route::get('/clinic/{id}', [BackendReviewController::class, 'getAllByClinicId'])->name('api.backend.reviews.clinic');
    Route::get('/user/{id}', [BackendReviewController::class, 'getAllByUserId'])->name('api.backend.reviews.user');
    Route::get('/all-by-user/{id}', [BackendReviewController::class, 'getAllMainUser'])->name('api.backend.reviews.all.by.user');
    Route::get('/detail/{id}', [BackendReviewController::class, 'detail'])->name('api.backend.reviews.detail');
    Route::post('/create', [BackendReviewController::class, 'create'])->name('api.backend.reviews.create');
    Route::put('/change/{id}', [BackendReviewController::class, 'changeStatus'])->name('api.backend.reviews.change.status');
//    Route::put('/update/{id}', [BackendReviewController::class, 'update'])->name('api.backend.reviews.update');
    Route::delete('/delete/{id}', [BackendReviewController::class, 'delete'])->name('api.backend.reviews.delete');
});

//Route::group(['prefix' => 'categories'], function () {
//    Route::get('/list', [BackendCategoryController::class, 'getAll'])->name('api.backend.categories.list');
//    Route::get('/detail/{id}', [BackendCategoryController::class, 'detail'])->name('api.backend.categories.detail');
//    Route::get('/user/{id}', [BackendCategoryController::class, 'getAllByUser'])->name('api.backend.categories.user');
////    Route::get('/clinic/{id}', [BackendCategoryController::class, 'getByClinic'])->name('api.backend.categories.clinic');
//    Route::post('/create', [BackendCategoryController::class, 'create'])->name('api.backend.categories.create');
//    Route::put('/update/{id}', [BackendCategoryController::class, 'update'])->name('api.backend.categories.update');
//    Route::delete('/delete/{id}', [BackendCategoryController::class, 'delete'])->name('api.backend.categories.delete');
//});

//Route::group(['prefix' => 'coupons'], function () {
//    Route::get('/list', [BackendCouponController::class, 'getAll'])->name('api.backend.coupons.list');
//    Route::post('/create', [BackendCouponController::class, 'create'])->name('api.backend.coupons.create');
//    Route::post('/update/{id}', [BackendCouponController::class, 'update'])->name('api.backend.coupons.update');
//    Route::delete('/delete/{id}', [BackendCouponController::class, 'delete'])->name('api.backend.coupons.delete');
//});
//
//
Route::group(['prefix' => 'doctors-info'], function () {
    Route::get('/list', [AdminDoctorInfoApi::class, 'getAll'])->name('api.backend.doctors.info.list');
    Route::get('/list-doctor', [AdminDoctorInfoApi::class, 'getAllByUser'])->name('api.backend.doctors.info.list.by.user');
    Route::get('/detail/{id}', [AdminDoctorInfoApi::class, 'detail'])->name('api.backend.doctors.info.detail');
    Route::get('/user/{id}', [AdminDoctorInfoApi::class, 'findByUser'])->name('api.backend.doctors.info.user');
    Route::post('/create', [AdminDoctorInfoApi::class, 'create'])->name('api.backend.doctors.info.create');
    Route::put('/update/{id}', [AdminDoctorInfoApi::class, 'update'])->name('api.backend.doctors.info.update');
    Route::post('/update-doctor/{id}', [AdminDoctorInfoApi::class, 'update'])->name('api.backend.doctors.info.update.doctor');
    Route::delete('/delete/{id}', [AdminDoctorInfoApi::class, 'delete'])->name('api.backend.doctors.info.delete');
});

Route::group(['prefix' => 'phamacitis'], function () {
    Route::get('/list', [AdminPhamacitisApi::class, 'getAll'])->name('api.backend.phamacitis.list');
    Route::get('/detail/{id}', [AdminPhamacitisApi::class, 'detail'])->name('api.backend.phamacitis.detail');
    Route::get('/user/{id}', [AdminPhamacitisApi::class, 'findByUser'])->name('api.backend.phamacitis.user');
});


/* Doctor department api */
Route::group(['prefix' => 'doctors-departments'], function () {
    Route::get('/list', [AdminDoctorDepartmentApi::class, 'getAll'])->name('api.backend.doctors.departments.list');
    Route::get('/detail/{id}', [AdminDoctorDepartmentApi::class, 'getById'])->name('api.backend.doctors.departments.detail');
    Route::get('/user/{id}', [AdminDoctorDepartmentApi::class, 'getAllByUserID'])->name('api.backend.doctors.departments.user');
    Route::post('/create', [AdminDoctorDepartmentApi::class, 'create'])->name('api.backend.doctors.departments.create');
    Route::put('/update/{id}', [AdminDoctorDepartmentApi::class, 'update'])->name('api.backend.doctors.departments.update');
    Route::delete('/delete/{id}', [AdminDoctorDepartmentApi::class, 'delete'])->name('api.backend.doctors.departments.delete');
});

//Route::group(['prefix' => 'question-like'], function () {
//    Route::get('is-like/{questionId}/{userId}', [QuestionLikesController::class, 'checkEmotion'])->name('api.backend.question-like.check');
//    Route::post('change/{questionId}/{userId}', [QuestionLikesController::class, 'changeEmotion'])->name('api.backend.question-like.change');
//});

Route::group(['prefix' => 'settings'], function () {
    Route::get('/list', [SettingController::class, 'getAll'])->name('api.backend.setting.list');
    Route::get('/create', [SettingController::class, 'createView'])->name('setting.create');
    Route::post('/creat', [SettingController::class, 'create'])->name('api.backend.setting.create');
    Route::get('/edit/{id}', [SettingController::class, 'edit'])->name('setting.edit');
    Route::post('/update/{id}', [SettingController::class, 'update'])->name('api.backend.setting.update');
});

Route::group(['prefix' => 'booking'], function () {
    Route::get('/edit/{id}', [BookingController::class, 'edit'])->name('api.backend.booking.edit');
    Route::post('/update/{id}', [BookingController::class, 'update'])->name('api.backend.booking.update');
    Route::delete('/delete/{id}', [BookingController::class, 'delete'])->name('api.backend.booking.delete');
});

Route::group(['prefix' => 'category-product'], function () {
    Route::get('index', [BackendCategoryProductController::class, 'index'])->name('api.backend.category-product.index');
    Route::get('edit/{id}', [BackendCategoryProductController::class, 'edit'])->name('api.backend.category-product.edit');
    Route::post('update', [BackendCategoryProductController::class, 'update'])->name('api.backend.category-product.update');
    Route::get('create', [BackendCategoryProductController::class, 'create'])->name('api.backend.category-product.create');
    Route::post('store', [BackendCategoryProductController::class, 'store'])->name('api.backend.category-product.store');
    Route::post('destroy/{id}', [BackendCategoryProductController::class, 'destroy'])->name('api.backend.category-product.destroy');
});

Route::group(['prefix' => 'product-medicine'], function () {
    Route::get('index', [BackendProductMedicineController::class, 'index'])->name('api.backend.product-medicine.index');
    Route::get('edit/{id}', [BackendProductMedicineController::class, 'edit'])->name('api.backend.product-medicine.edit');
    Route::post('update', [BackendProductMedicineController::class, 'update'])->name('api.backend.product-medicine.update');
    Route::get('create', [BackendProductMedicineController::class, 'create'])->name('api.backend.product-medicine.create');
    Route::post('store', [BackendProductMedicineController::class, 'store'])->name('api.backend.product-medicine.store');
    Route::post('destroy/{id}', [BackendProductMedicineController::class, 'destroy'])->name('api.backend.product-medicine.destroy');
});

Route::group(['prefix' => 'carts'], function () {
    Route::get('user/{id}', [CartApi::class, 'showCartByUserID'])->name('api.backend.cart.user');
    Route::post('create', [CartApi::class, 'addToCart'])->name('api.backend.cart.create');
    Route::post('change-quantity/{id}', [CartApi::class, 'changeQuantityCart'])->name('api.backend.cart.change.quantity');
    Route::delete('delete/{id}', [CartApi::class, 'deleteCart'])->name('api.backend.cart.delete');
    Route::delete('clear/{id}', [CartApi::class, 'clearCart'])->name('api.backend.cart.clear');
});

Route::group(['prefix' => 'service-clinic-pharmacy'], function () {
    Route::get('index', [BackendServiceClinicController::class, 'index'])->name('api.backend.service-clinic-pharmacy.index');
    Route::get('edit/{id}', [BackendServiceClinicController::class, 'edit'])->name('api.backend.service-clinic-pharmacy.edit');
    Route::post('update', [BackendServiceClinicController::class, 'update'])->name('api.backend.service-clinic-pharmacy.update');
    Route::get('create', [BackendServiceClinicController::class, 'create'])->name('api.backend.service-clinic-pharmacy.create');
    Route::post('store', [BackendServiceClinicController::class, 'store'])->name('api.backend.service-clinic-pharmacy.store');
    Route::post('destroy/{id}', [BackendServiceClinicController::class, 'destroy'])->name('api.backend.service-clinic-pharmacy.destroy');
});

Route::group(['prefix' => 'account-register'], function () {
    Route::get('index', [BackendAccountRegisterController::class, 'index'])->name('api.backend.account-register.index');
    Route::post('update/{id}', [BackendAccountRegisterController::class, 'update'])->name('api.backend.account-register.update');
});

Route::group(['prefix' => 'bookings'], function () {
    Route::get('list', [AdminBookingApi::class, 'getAll'])->name('api.bookings.list');
    Route::get('list-by-clinics/{id}', [AdminBookingApi::class, 'getAllByClinicId'])->name('api.bookings.getAllByClinicId');
    Route::get('list-by-user/{id}', [AdminBookingApi::class, 'getAllByUserId'])->name('api.bookings.getAllByUserId');
    Route::get('detail/{id}', [AdminBookingApi::class, 'detail'])->name('api.bookings.detail');
    Route::post('update/{id}', [AdminBookingApi::class, 'updateStatus'])->name('api.bookings.updateStatus');
    Route::post('cancel/{id}', [AdminBookingApi::class, 'cancelBooking'])->name('api.bookings.cancel');
    Route::delete('delete/{id}', [AdminBookingApi::class, 'delete'])->name('api.bookings.delete');
});

Route::group(['prefix' => 'news'], function () {
    Route::get('/list', [AdminNewsApi::class, 'getAll'])->name('api.news.list');
    Route::get('/users/{id}', [AdminNewsApi::class, 'getAllByUserID'])->name('api.news.users');
    Route::get('/detail/{id}', [AdminNewsApi::class, 'detail'])->name('api.news.detail');
});

Route::group(['prefix' => 'short-videos'], function () {
    Route::get('/list', [AdminShortVideoApi::class, 'getAll'])->name('api.medical.short.videos.list');
    Route::get('/users/{id}', [AdminShortVideoApi::class, 'getAllByUserID'])->name('api.medical.short.videos.users');
    Route::get('/topic/{id}', [AdminShortVideoApi::class, 'getAllByTopicID'])->name('api.medical.short.videos.topic');
    Route::get('/detail/{id}', [AdminShortVideoApi::class, 'detail'])->name('api.medical.short.videos.detail');

    Route::post('/create', [AdminShortVideoApi::class, 'create'])->name('api.medical.short.videos.create');
    Route::put('/update/{id}', [AdminShortVideoApi::class, 'update'])->name('api.medical.short.videos.update');
    Route::put('/change/{id}', [AdminShortVideoApi::class, 'changeStatus'])->name('api.medical.short.videos.changeStatus');
    Route::delete('/delete/{id}', [AdminShortVideoApi::class, 'delete'])->name('api.medical.short.videos.delete');
});
