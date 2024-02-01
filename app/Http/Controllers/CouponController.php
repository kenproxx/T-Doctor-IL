<?php

namespace App\Http\Controllers;

use App\Enums\CouponStatus;
use App\Http\Controllers\restapi\MainApi;
use App\Models\Clinic;
use App\Models\Coupon;
use App\Models\CouponApply;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    public function show($id)
    {
        $coupon = Coupon::find($id);
        if (!$coupon || $coupon->status != CouponStatus::ACTIVE) {
            return response("coupon not found", 404);
        }
        return response()->json($coupon, $id);
    }

    public function index()
    {
        return view('clinics.listClinics');
    }

    public function detail($id)
    {
        return view('clinics.detailClinics', compact('id'));
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
        $isAdmin = $this->isAdmin();
        return view('admin.coupon.tab-edit-coupon', compact('coupon', 'isAdmin'));
    }

    public function isAdmin()
    {
        $role_user = RoleUser::where('user_id', Auth::user()->id)->first();

        $roleNames = Role::where('id', $role_user->role_id)->pluck('name');

        if ($roleNames->contains('ADMIN')) {
            return true;
        } else {
            return false;
        }
    }

    public function getListCoupon($user_id = null, $status = null)
    {
        $isAdmin = User::isAdmin($user_id);

        if ($isAdmin) {
            if ($status) {
                $coupons = Coupon::where('status', $status)->get();
            } else {
                $coupons = Coupon::all();
            }

            return response()->json($coupons);

        } else {
            $clinic = Clinic::where('user_id', $user_id)->first();
            // tìm clinic của user nay, nếu có thì lấy ra tất cả các coupon của clinic đó
            if (!$clinic) {
                return response((new MainApi())->returnMessage("Clinic not found"), 404);
            }
            $coupons = Coupon::where('clinic_id', $clinic->id);
        }

        if ($status) {
            $coupons = $coupons->where('status', $status);
        }

        $coupons = $coupons->get();

        return response()->json($coupons);
    }

    public function getListCouponApplied($user_id = null, $status = null)
    {
        if ($user_id) {
            $listCoupon = CouponApply::where('user_id', $user_id);
        } else {
            $listCoupon = CouponApply::where('user_id', Auth::user()->id);
        }

        if ($status) {
            $listCoupon = $listCoupon->where('status', $status);
        }

        $listCoupon = $listCoupon->get();

        return response()->json($listCoupon);
    }
}
