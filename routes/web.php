<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AddressMapController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthSocialController;
use App\Http\Controllers\backend\BackendProductInfoController;
use App\Http\Controllers\backend\BackendQuestionController;
use App\Http\Controllers\backend\BackendWishListController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingResultController;
use App\Http\Controllers\CalcViewQuestionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\connect\CallVideoController;
use App\Http\Controllers\connect\ChatMessageController;
use App\Http\Controllers\connect\WidgetChatController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorInfoController;
use App\Http\Controllers\DoctorReviewController;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\FleaMarketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\NewEventController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PharmaciesController;
use App\Http\Controllers\ProductInfoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\restapi\BookingApi;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReviewStoreController;
use App\Http\Controllers\ServiceClinicController;
use App\Http\Controllers\ShortVideoController;
use App\Http\Controllers\SymptomController;
use App\Http\Controllers\TopicVideoController;
use App\Http\Controllers\WhatFreeToDay;
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
Route::middleware(['user.active'])->group(function () {
    Route::get('/lang/{locale}', [MainController::class, 'setLanguage'])->name('language');

    Route::get('/', 'HomeController@index')->name('home');

    Route::post('/login', [AuthController::class, 'login'])->name('loginProcess');
    Route::post('/register', [AuthController::class, 'register'])->name('registerProcess');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logoutProcess');


    Route::get('/login-google', [AuthSocialController::class, 'getGoogleSignInUrl'])->name('login.google');
    Route::get('/login-google-callback', [AuthSocialController::class, 'loginCallback'])->name('login.google.callback');
    Route::get('/login-role', [AuthSocialController::class, 'chooseRole'])->name('login.social.choose.role');

    Route::post('forget-password/send',
        [ProfileController::class, 'handleForgetPassword'])->name('user.forget.password.send');
    Route::post('forget-password/check', [ProfileController::class, 'checkOTP'])->name('user.forget.password.check');

    Route::group(['prefix' => 'news-events'], function () {
        Route::get('', [NewEventController::class, 'index'])->name('index.new');
        Route::get('detail/{id}', [NewEventController::class, 'detail'])->name('detail.new');
    });
    Route::group(['prefix' => 'recruitment'], function () {
        Route::get('/index', [RecruitmentController::class, 'index'])->name('recruitment.index');
        Route::get('/apply', [RecruitmentController::class, 'apply'])->name('recruitment.apply');
        Route::get('/add-cv', [RecruitmentController::class, 'addCv'])->name('recruitment.add.cv');
        Route::get('/detail', [RecruitmentController::class, 'detail'])->name('recruitment_detail');
        Route::get('/edit-cv', [RecruitmentController::class, 'editCv'])->name('recruitment.edit.cv');
    });

    Route::group(['prefix' => 'wish-lists'], function () {
        Route::get('/list', [BackendWishListController::class, 'getAll'])->name('api.backend.wish.lists.list');
        Route::get('/detail/{id}', [BackendWishListController::class, 'detail'])->name('api.backend.wish.lists.detail');
        Route::post('/create', [BackendWishListController::class, 'create'])->name('api.backend.wish.lists.create');
        Route::POST('/update/{id}',
            [BackendWishListController::class, 'update'])->name('api.backend.wish.lists.update');
        Route::delete('/delete/{id}',
            [BackendWishListController::class, 'delete'])->name('api.backend.wish.lists.delete');
        Route::delete('/delete-list',
            [BackendWishListController::class, 'deleteMultil'])->name('api.backend.wish.lists.delete.listId');
    });

    Route::group(['prefix' => 'examination'], function () {
        Route::get('/index', [ExaminationController::class, 'index'])->name('examination.index');
        Route::get('/doctor-info/{id}', [ExaminationController::class, 'infoDoctor'])->name('examination.doctor_info');
        Route::get('/chat-with-doctor/{id}',
            [ExaminationController::class, 'chatWithDoctor'])->name('examination.doctor_info.chat');
        Route::get('/best-doctor', [ExaminationController::class, 'bestDoctor'])->name('examination.best_doctor');
        Route::get('/new-doctor', [ExaminationController::class, 'newDoctor'])->name('examination.new_doctor');
        Route::get('/available-doctor',
            [ExaminationController::class, 'availableDoctor'])->name('examination.available_doctor');
        Route::get('/find-my-medicine',
            [ExaminationController::class, 'findMyMedicine'])->name('examination.findmymedicine');
        Route::get('/best-pharmacists',
            [ExaminationController::class, 'bestPharmacists'])->name('examination.bestpharmacists');
        Route::get('/new-pharmacists',
            [ExaminationController::class, 'newPharmacists'])->name('examination.newpharmacists');
        Route::get('/available-pharmacists',
            [ExaminationController::class, 'availablePharmacists'])->name('examination.availablepharmacists');
        Route::get('/hot-deal-medicine',
            [ExaminationController::class, 'hotDealMedicine'])->name('examination.hotdealmedicine');
        Route::get('/new-medicine', [ExaminationController::class, 'newMedicine'])->name('examination.newmedicine');
        Route::get('/recommended', [ExaminationController::class, 'recommended'])->name('examination.recommended');
        Route::get('/category/{id}',
            [ExaminationController::class, 'findByCategory'])->name('examination.findByCategory');
        Route::get('/my-personal-doctor',
            [ExaminationController::class, 'myPersonalDoctor'])->name('examination.mypersonaldoctor');

        Route::post('search',
            [ExaminationController::class, 'searchInFindMyMedicine'])->name('examination.search.in.FindMyMedicine');
    });

    Route::group(['prefix' => 'questions'], function () {
        Route::get('/get-list', [BackendQuestionController::class, 'custom_getlist'])->name('questions.custome.list');
        Route::get('/list/{id}', [BackendQuestionController::class, 'getListQuestion'])->name('questions.list.filter');
        Route::get('/user-id/{id}',
            [BackendQuestionController::class, 'getQuestionByUserId'])->name('questions.list.userid');
        Route::get('/detail/{id}', [BackendQuestionController::class, 'detail'])->name('api.backend.questions.detail');
        Route::get('/{userId}/{categoryId}', [
            BackendQuestionController::class,
            'getQuestionByUserIdAndCategoryId'
        ])->name('questions.list.userid.categoryId');
    });

    Route::group(['prefix' => 'pharmacies'], function () {
        Route::get('/list-pharmacies', [PharmaciesController::class, 'index'])->name('api.pharmacies.list');
        Route::get('/detail-pharmacies/{id}',
            [PharmaciesController::class, 'detailPharmacies'])->name('api.pharmacies.detail');
    });

    Route::group(['prefix' => 'mentoring'], function () {
        Route::get('', [ExaminationController::class, 'mentoring'])->name('examination.mentoring');
        Route::get('detail/{id}', [ExaminationController::class, 'showMentoring'])->name('examination.mentoring.show');
        Route::post('search', [ExaminationController::class, 'searchMentoring'])->name('examination.mentoring.search');
        Route::get('/ask-a-question',
            [ExaminationController::class, 'createMentoring'])->name('examination.mentoring.create');
        Route::get('/calc-view-comment/{id}',
            [CalcViewQuestionController::class, 'calcView'])->name('examination.mentoring.calc.view');
    });

    Route::group(['prefix' => 'medicine'], function () {
        Route::get('/', [MedicineController::class, 'index'])->name('medicine');
        Route::get('/detail/{id}', [MedicineController::class, 'detail'])->name('medicine.detail');
        Route::get('/wish-list', [MedicineController::class, 'wishList'])->name('medicine.wishList');
        Route::post('search', [MedicineController::class, 'searchOnlineMedicine'])->name('medicine.search');
        Route::post('get-name-location',
            [MedicineController::class, 'getLocationByUserId'])->name('medicine.get.name.location.by.user');

    });

    Route::group(['prefix' => 'clinic'], function () {
        Route::get('/', [ClinicController::class, 'index'])->name('clinic');
        Route::get('/detail/{id}', [ClinicController::class, 'detail'])->name('clinic.detail');
        Route::post('/create', [ClinicController::class, 'store'])->name('clinic.booking.store');
        Route::get('/showNear/{id}', [ClinicController::class, 'showNear'])->name('clinic.booking.showNear');

    });
    Route::group(['prefix' => 'product'], function () {
        Route::get('/lists', [BackendProductInfoController::class, 'index'])->name('backend.products.list');
        Route::get('/search', [BackendProductInfoController::class, 'search'])->name('backend.products.search');
    });

    Route::group(['prefix' => 'booking'], function () {
        Route::get('/lists', [BookingController::class, 'index'])->name('booking.list.by.user');
        Route::get('/list-by-users/{id}/{status}',
            [BookingApi::class, 'getAllBookingByUserId'])->name('booking.list.users');
        Route::delete('/delete-booking/{id}', [BookingApi::class, 'cancelBooking'])->name('booking.delete.users');
        Route::delete('/cancel-booking/{id}', [BookingApi::class, 'bookingCancel'])->name('booking.ancel.users');
        Route::get('/search', [BackendProductInfoController::class, 'search'])->name('backend.booking.search');
    });


    Route::get('/address', [AddressMapController::class, 'index']);
    Route::post('/save-address', [AddressMapController::class, 'store']);

    Route::group(['prefix' => 'flea-market'], function () {
        Route::get('/', [FleaMarketController::class, 'index'])->name('flea-market.index');
        Route::get('wish-list-flea-market', [FleaMarketController::class, 'wishList'])->name('flea.market.wish.list');
        Route::get('my-store', [FleaMarketController::class, 'myStore'])->name('flea.market.my.store');
        Route::get('review', [FleaMarketController::class, 'review'])->name('flea.market.review');
        Route::get('sell-product', [FleaMarketController::class, 'sellProduct'])->name('flea.market.sell.product');
        Route::get('edit-product/{id}', [FleaMarketController::class, 'editProduct'])->name('flea.market.edit.product');
        Route::get('product-detail/{id}',
            [FleaMarketController::class, 'productDetail'])->name('flea.market.product.detail');
        Route::get('shop-info/{id}', [FleaMarketController::class, 'ShopInfo'])->name('flea.market.product.shop.info');
        Route::get('review-store',
            [ReviewStoreController::class, 'ReviewStore'])->name('flea.market.product.review.store');
        Route::get('create-review-store',
            [ReviewStoreController::class, 'createReviewStore'])->name('flea.market.product.create.review.store');
        Route::post('create-review/{id}',
            [ReviewStoreController::class, 'createReview'])->name('flea.market.product.create.review');

    });
    Route::group(['prefix' => 'what-free'], function () {
        Route::get('/', [WhatFreeToDay::class, 'index'])->name('what.free');
        Route::get('/to-day', [WhatFreeToDay::class, 'toDay'])->name('what.free.to.day');
        Route::get('/wit-mission', [WhatFreeToDay::class, 'withMission'])->name('what.free.with.mission');
        Route::get('/discounted-sevice',
            [WhatFreeToDay::class, 'discountedSevice'])->name('what.free.discounted.service');
        Route::get('/detail/{id}', [WhatFreeToDay::class, 'detail'])->name('what.free.detail');
        Route::get('/campaign', [WhatFreeToDay::class, 'campaign'])->name('what.free.campaign');

    });

    Route::group(['prefix' => 'address'], function () {
        Route::post('nation', [AddressController::class, 'getListNation'])->name('address.get.list.nation');
        Route::post('province', [AddressController::class, 'getListProvince'])->name('address.get.list.province');
        Route::post('district', [AddressController::class, 'getListDistrict'])->name('address.get.list.district');
        Route::post('commune', [AddressController::class, 'getListCommune'])->name('address.get.list.commune');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('admin/home', [HomeController::class, 'admin'])->name('admin.home');

        Route::get('admin/chat-unseen', [HomeController::class, 'listMessageUnseen'])->name('admin.list.chat.unseen');

        Route::post('/save-user-login-social',
            [AuthSocialController::class, 'saveUser'])->name('save.user.login.social');

        Route::get('profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('profile-update', [ProfileController::class, 'update'])->name('profile.update');

        Route::group(['prefix' => 'categories'], function () {
            Route::get('admin/list', [CategoryController::class, 'index'])->name('view.admin.category.index');
            Route::get('admin/create', [CategoryController::class, 'create'])->name('view.admin.category.create');
            Route::get('admin/detail/{id}', [CategoryController::class, 'detail'])->name('view.admin.category.detail');
        });

        Route::group(['prefix' => 'checkout'], function () {
            Route::get('/', [CheckoutController::class, 'index'])->name('user.checkout.index');
            Route::get('/return-checkout',
                [CheckoutController::class, 'returnCheckout'])->name('return.checkout.payment');
            Route::post('/imm', [CheckoutController::class, 'checkoutByImm'])->name('user.checkout.imm');
            Route::post('/vnpay', [CheckoutController::class, 'checkoutByVNPay'])->name('user.checkout.vnpay');
        });

        Route::group(['prefix' => 'orders'], function () {
            Route::get('admin/list', [OrderController::class, 'index'])->name('view.admin.orders.index');
            Route::get('admin/detail/{id}', [OrderController::class, 'detail'])->name('view.admin.orders.detail');
        });

        Route::group(['prefix' => 'reviews'], function () {
            Route::get('admin/list', [ReviewController::class, 'index'])->name('view.admin.reviews.index');
            Route::get('admin/detail/{id}', [ReviewController::class, 'detail'])->name('view.admin.reviews.detail');
        });

        Route::group(['prefix' => 'short-video'], function () {
            Route::get('show', [ShortVideoController::class, 'showVideo'])->name('short.videos.show');
            Route::get('show/{id}', [ShortVideoController::class, 'detail'])->name('short.videos.item');
        });

        Route::group(['prefix' => 'short-video'], function () {
            Route::get('list', [ShortVideoController::class, 'getList'])->name('web.videos.list');
            Route::get('detail/{id}', [ShortVideoController::class, 'getById'])->name('web.videos.detail');
        });

        Route::group(['prefix' => 'reviews-doctor'], function () {
            Route::get('admin/list', [DoctorReviewController::class, 'index'])->name('view.reviews.doctor.index');
            Route::get('admin/detail/{id}',
                [DoctorReviewController::class, 'detail'])->name('view.reviews.doctor.detail');
        });

        Route::group(['prefix' => 'service-clinics'], function () {
            Route::get('list', [ServiceClinicController::class, 'getListService'])->name('user.service.clinics.list');
            Route::get('detail/{id}',
                [ServiceClinicController::class, 'detailService'])->name('user.service.clinics.detail');
            Route::get('create',
                [ServiceClinicController::class, 'createService'])->name('user.service.clinics.create');
        });

        Route::group(['prefix' => 'topics-videos'], function () {
            Route::get('list', [TopicVideoController::class, 'getList'])->name('user.topic.videos.list');
            Route::get('detail/{id}', [TopicVideoController::class, 'detail'])->name('user.topic.videos.detail');
            Route::get('create', [TopicVideoController::class, 'create'])->name('user.topic.videos.create');
        });

        Route::group(['prefix' => 'department'], function () {
            Route::get('list', [DepartmentController::class, 'index'])->name('department.index');
            Route::get('create', [DepartmentController::class, 'create'])->name('department.create');
            Route::post('store', [DepartmentController::class, 'store'])->name('departments.store');
            Route::get('edit/{id}', [DepartmentController::class, 'edit'])->name('departments.edit');
            Route::post('update/{id}', [DepartmentController::class, 'update'])->name('departments.update');
        });

        Route::group(['prefix' => 'symptom'], function () {
            Route::get('list', [SymptomController::class, 'index'])->name('symptom.index');
            Route::get('create', [SymptomController::class, 'create'])->name('symptom.create');
            Route::post('store', [SymptomController::class, 'store'])->name('symptom.store');
            Route::get('edit/{id}', [SymptomController::class, 'edit'])->name('symptom.edit');
            Route::post('update/{id}', [SymptomController::class, 'update'])->name('symptom.update');
        });

        Route::group(['prefix' => 'connect'], function () {
            Route::group(['prefix' => 'video'], function () {
                Route::get('index3', [CallVideoController::class, 'index3'])->name('api.backend.connect.video.index3');

                Route::post("/createMeeting", [CallVideoController::class, 'createMeeting'])->name("createMeeting");

                Route::post("/validateMeeting",
                    [CallVideoController::class, 'validateMeeting'])->name("validateMeeting");

                Route::get("/handle-change-status-download-record/{roomName}",
                    [CallVideoController::class, 'changeStatusQueueDownloadRecord'])->name("download.change.status");

                Route::get("/meeting/{meetingId}", function ($meetingId) {

                    $METERED_DOMAIN = env('METERED_DOMAIN');
                    return view('admin.connect.video.meeting', [
                        'METERED_DOMAIN' => $METERED_DOMAIN,
                        'MEETING_ID' => $meetingId
                    ]);
                })->name('joinMeeting');
            });

            Route::group(['prefix' => 'chat'], function () {
                Route::get('index', [ChatMessageController::class, 'index'])->name('api.backend.connect.chat.index');

                Route::get('getListUserWasConnect', [
                    WidgetChatController::class,
                    'getListUserWasConnect'
                ])->name('api.backend.connect.chat.getListUserWasConnect');
                Route::get('getMessageByUserId/{id}', [
                    WidgetChatController::class,
                    'getMessageByUserId'
                ])->name('api.backend.connect.chat.getMessageByUserId');
                Route::get('seen-message/{id}',
                    [WidgetChatController::class, 'handleSeenMessage'])->name('api.backend.connect.chat.seen-message');
            });
        });

        /* Booking result */
        Route::group(['prefix' => 'web/booking-result'], function () {
            Route::get('/list/{id}', [BookingResultController::class, 'getList'])->name('web.booking.result.list');
            Route::get('/detail/{id}', [BookingResultController::class, 'detail'])->name('web.booking.result.detail');
        });
    });

    Route::get('/send', 'SendMessageController@index')->name('send');
    Route::post('/postMessage', 'SendMessageController@sendMessage')->name('postMessage');

// QrCode
    Route::group(['prefix' => 'qr-code'], function () {
        Route::get('/doctor-info/{id}',
            [DoctorInfoController::class, 'showFromQrCode'])->name('qr.code.show.doctor.info');
    });

    /* List Api*/
//Auth
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/login', [LoginController::class, 'login'])->name('api.user.login');
        Route::post('/logout', [LoginController::class, 'logout'])->name('api.user.logout');
        Route::post('/register', [RegisterController::class, 'register'])->name('api.user.register');
    });
//Product
    Route::group(['prefix' => 'products'], function () {
        Route::get('', [ProductInfoController::class, 'index'])->name('product.list');

    });

    /* Admin */
    Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
        require_once __DIR__.'/admin.php';
    });

    /* Business */
    Route::group(['prefix' => 'api', 'middleware' => ['business']], function () {
        require_once __DIR__.'/permission/business.php';
    });

    /* Medical */
    Route::group(['prefix' => 'api', 'middleware' => ['medical']], function () {
        require_once __DIR__.'/permission/medical.php';
    });

    /* Normal */
    Route::group(['prefix' => 'api', 'middleware' => 'normal'], function () {
        require_once __DIR__.'/permission/normal.php';
    });

    /* Authenticate */
    Route::group(['prefix' => 'api', 'middleware' => 'jwt'], function () {
        require_once __DIR__.'/backend.php';
    });

    /* Free api */
    Route::group(['prefix' => ''], function () {
        require_once __DIR__.'/restapi.php';
    });

// Route maps
    Route::get('explore', [MapController::class, 'explore'])->name('explore.list');
    Route::get('/info-user/{id}', [ProfileController::class, 'infoUser'])->name('info.user');
    Route::get('/department', [DoctorInfoController::class, 'listDepartment'])->name('list.department');



});
