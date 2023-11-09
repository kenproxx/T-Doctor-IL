<?php

namespace App\Http\Controllers;

use App\Enums\CouponStatus;
use App\Enums\ProductStatus;
use App\Models\Coupon;
use App\Models\ProductInfo;
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
    public function home()
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        return view('admin.home-admin', compact('widget'));
    }

    public function listProduct()
    {
        return view('admin.product.list-product');
    }
    public function listClinics()
    {
        return view('admin.clinic.list-clinics');
    }
    public function listCoupon()
    {
        return view('admin.coupon.list-coupon');
    }
    public function listDoctor()
    {
        return view('admin.doctor.list-doctors');
    }
}
