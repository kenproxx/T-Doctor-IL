<?php

namespace App\Http\Controllers;

use App\Enums\ClinicStatus;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function show($id)
    {
        $clinics = Coupon::find($id);
        if (!$clinics || $clinics->status != ClinicStatus::ACTIVE) {
            return response("Product not found", 404);
        }
        return response()->json($clinics,$id);
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
        $clinics = Coupon::find($id);
        if (!$clinics || $clinics->status != ClinicStatus::ACTIVE) {
            return response("Product not found", 404);
        }
        return view('admin.coupon.tab-edit-coupon',compact('clinics'));
    }
}
