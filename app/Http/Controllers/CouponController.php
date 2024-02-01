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

    public function getListCoupon($user_id = null)
    {
        $isAdmin = User::isAdmin($user_id);

        if ($isAdmin) {
            $coupons = Coupon::all();
        } else {
            // tìm clinic của user nay, nếu có thì lấy ra tất cả các coupon của clinic đó
            $clinic = Clinic::where('user_id', $user_id)->first();
            if (!$clinic) {
                return response((new MainApi())->returnMessage("Clinic not found"), 404);
            }
            $coupons = Coupon::where('clinic_id', $clinic->id)->get();
        }

        return response()->json($coupons);
    }

    public function getListCouponApplied($user_id = null)
    {
        if ($user_id) {
            $listCoupon = CouponApply::where('user_id', $user_id)->get();
        } else {
            $listCoupon = CouponApply::where('user_id', Auth::user()->id)->get();
        }

        return response()->json($listCoupon);
    }
}
