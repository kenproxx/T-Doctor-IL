<?php

namespace App\Http\Controllers;

use App\Enums\CouponStatus;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function show($id)
    {
        $coupon = Coupon::find($id);
        if (!$coupon || $coupon->status != CouponStatus::ACTIVE) {
            return response("coupon not found", 404);
        }
        return response()->json($coupon,$id);
    }

    public function index()
    {
        return view('clinics.listClinics');
    }

    public function detail($id)
    {
        return view('clinics.detailClinics',compact('id'));
    }

    public function create()
    {
        return view('admin.coupon.tab-create-coupon');
    }

    public function edit($id)
    {
        $coupon = Coupon::find($id);
        if (!$coupon) {
            return response("coupon not found", 404);
        }
        return view('admin.coupon.tab-edit-coupon',compact('coupon'));
    }
}
