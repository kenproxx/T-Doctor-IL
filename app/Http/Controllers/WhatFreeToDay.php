<?php

namespace App\Http\Controllers;

use App\Enums\CouponStatus;
use App\Enums\SocialUserStatus;
use App\Enums\TypeCoupon;
use App\Models\Clinic;
use App\Models\Coupon;
use App\Models\SocialUser;
use Illuminate\Support\Facades\Auth;

class WhatFreeToDay extends Controller
{
    public function index()
    {
        $activeCouponsQuery = Coupon::where('status', '=', CouponStatus::ACTIVE);
        $now = now('Asia/Ho_Chi_Minh');
        $coupons = $activeCouponsQuery->whereIn('type', TypeCoupon::getArray())->where('end_evaluate', '>',
            $now)->orderBy('created_at', 'desc')->get();
        $coupons_freeToDay = $coupons->where('type', TypeCoupon::FREE_TODAY)->take(6);
        $coupons_withMission = $coupons->where('type', TypeCoupon::FREE_MISSION)->take(6);
        $coupons_discount = $coupons->where('type', TypeCoupon::DISCOUNT_SERVICE)->take(6);

        return view('What-free.what-free', compact('coupons_freeToDay', 'coupons_withMission', 'coupons_discount'));
    }

    public function toDay()
    {
        return view('What-free.tab-free-today');
    }

    public function withMission()
    {
        return view('What-free.tab-with-mission');
    }

    public function discountedSevice()
    {
        return view('What-free.tab-discounted-sevice');
    }

    public function detail($id)
    {
        $coupon = Coupon::where('id', $id)->first();
        $coupon->views = $coupon->views + 1;
        $coupon->save();
        $user_id = $coupon->user_id;
        $clinic = Clinic::where('user_id', $user_id)->first();
        if (Auth::check()) {
            $socials = SocialUser::where('user_id', Auth::user()->id)->where('status',
                    SocialUserStatus::ACTIVE)->first();
        } else {
            $socials = '';
        }

        return view('What-free.detail-what-free', compact('coupon', 'clinic', 'socials'));
    }

    public function campaign()
    {
        return view('What-free.my-campaign');
    }


    public function seeAll($type)
    {
        $now = now('Asia/Ho_Chi_Minh');
        $coupons = Coupon::where('status', CouponStatus::ACTIVE)->where('type', $type)->where('endDate', '>',
                $now)->latest('created_at')->paginate(15);

        return view('What-free.tab-see-all', compact('coupons'));
    }


}
