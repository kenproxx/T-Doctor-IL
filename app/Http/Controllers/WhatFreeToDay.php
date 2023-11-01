<?php

namespace App\Http\Controllers;

use App\Enums\CouponStatus;
use App\Models\Clinic;
use App\Models\Coupon;

class WhatFreeToDay extends Controller
{
    public function index()
    {
        $coupons = Coupon::where('status', '!=', CouponStatus::DELETED)->get();
        return view('What-free.what-free', compact('coupons'));
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
        return view('What-free.detail-what-free', compact('coupon', 'clinic'));
    }
    public function campaign()
    {
        return view('What-free.my-campaign');
    }
}
