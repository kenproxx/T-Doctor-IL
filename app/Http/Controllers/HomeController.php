<?php

namespace App\Http\Controllers;

use App\Enums\CouponStatus;
use App\Enums\ProductStatus;
use App\Enums\SettingStatus;
use App\Models\Booking;
use App\Models\Coupon;
use App\Models\CouponApply;
use App\Models\ProductInfo;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        if (!Auth::check()) {
            setCookie('accessToken', null);
        }
        $coupons = Coupon::where('status', CouponStatus::ACTIVE)->get();
        $products = ProductInfo::where('status', ProductStatus::ACTIVE)->get();
        return view('home', compact('coupons', 'products'));
    }

    public function admin()
    {
        return view('admin.home-admin');
    }

    public function listProduct()
    {
        return view('admin.product.list-product');
    }

    public function listClinics()
    {
        $reflector = new \ReflectionClass('App\Enums\TypeBusiness');
        $types = $reflector->getConstants();
        return view('admin.clinic.list-clinics', compact('types'));
    }

    public function listCoupon()
    {
        return view('admin.coupon.list-coupon');
    }

    public function listApplyCoupon($id)
    {
        $applyCoupons = CouponApply::where('coupon_id', $id)->get();
        return view('admin.coupon.tab-list-apply-coupon', compact('applyCoupons'));
    }

    public function listDoctor()
    {
        $reflector = new \ReflectionClass('App\Enums\TypeMedical');
        $types = $reflector->getConstants();
        return view('admin.doctor.list-doctors', compact('types'));
    }

    public function listPhamacitis()
    {
        return view('admin.doctor.list-doctors');
    }

    public function listStaff()
    {
        //get list staff by manager_id = auth()->id()
        $users = User::where('manager_id', Auth::id())->get();

        return view('admin.staff.list-staff', compact('users'));
    }

    public function listConfig()
    {
        $settingConfig = Setting::where('status', SettingStatus::ACTIVE)->first();
        return view('admin.setting-config.list-config', compact('settingConfig'));
    }

    public function listBooking()
    {
        $bookings = Booking::paginate(20);

        return view('admin.booking.list-booking', compact('bookings'));
    }

}
