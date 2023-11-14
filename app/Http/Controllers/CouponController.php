<?php

namespace App\Http\Controllers;

use App\Enums\CouponStatus;
use App\Models\Coupon;
use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CouponController extends Controller
{
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
        $isAdmin = $this->isAdmin();
        return view('admin.coupon.tab-edit-coupon',compact('coupon', 'isAdmin'));
    }
}
