<?php

namespace App\Http\Controllers\backend;

use App\Enums\CouponStatus;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Models\Clinic;
use App\Models\Coupon;
use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BackendCouponController extends Controller
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
    public function getAll()
    {


        if ($this->isAdmin()) {
            $coupons = Coupon::all();
        } else {
            if (Auth::user()->manager_id) {
                $clinic_id = Clinic::where('user_id', Auth::user()->manager_id)->pluck('id');
            } else {
                $clinic_id = Clinic::where('user_id', Auth::user()->id)->pluck('id');
            }
            $coupons = Coupon::where('clinic_id', $clinic_id)->get();
        }

        return response()->json($coupons);
    }

    public function getListCouponForUser()
    {
        $coupons = Coupon::where('status', '=', CouponStatus::ACTIVE)->get();
        return response()->json($coupons);
    }

    public function getAllByUserID(Request $request, $id)
    {
        $status = $request->input('status');
        if ($status) {
            $coupons = Coupon::where('status', $status)->where('user_id', $id)->get();
        } else {
            $coupons = Coupon::where('status', '!=', CouponStatus::DELETED)->where('user_id', $id)->get();
        }
        return response()->json($coupons);
    }

    public function getByCode($code)
    {
        $coupon = Coupon::where('code', 'like', '%' . $code . '%')->first();
        if (!$coupon || $coupon->status == CouponStatus::DELETED) {
            return response('Not found', 404);
        }
        return response()->json($coupon);
    }

    public function search(Request $request)
    {
        $title = $request->input('title');
        $code = $request->input('code');
        $user_id = $request->input('user_id');
        $status = $request->input('status');

        $query = [];

        if ($title) {
            $str = ['title', 'like', '%' . $title . '%'];
            array_push($query, $str);
        }
        if ($status) {
            $str = ['status', '=', $status];
            array_push($query, $str);
        }

        if ($code) {
            $str = ['code', 'like', '%' . $code . '%'];
            array_push($query, $str);
        }

        if ($user_id) {
            $str = ['user_id', '=', $user_id];
            array_push($query, $str);
        }

        if (!$title && !$status && !$code && !$user_id) {
            $coupons = Coupon::where('status', '!=', CouponStatus::DELETED)->get();
        } else {
            $coupons = Coupon::where($query)->get();
        }

        return response()->json($coupons);
    }

    public function detail($id)
    {
        $coupon = Coupon::find($id);
        if (!$coupon || $coupon->status == CouponStatus::DELETED) {
            return response('Not found', 404);
        }
        $coupon->views = $coupon->views + 1;
        $coupon->save();
        return response()->json($coupon);
    }

    public function create(Request $request)
    {
        try {
            $coupon = new Coupon();

            $this->saveCoupon($coupon, $request);

            return response()->json($coupon);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $coupon = Coupon::find($id);
            if (!$coupon) {
                return response('Not found!', 404);
            }

            $this->saveCoupon($coupon, $request);

            return response()->json($coupon);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

    public function delete($id)
    {
        try {
            $coupon = Coupon::find($id);
            if (!$coupon || $coupon->status == CouponStatus::DELETED) {
                return response('Not found', 404);
            }

            $coupon->status = CouponStatus::DELETED;
            $success = $coupon->save();
            if ($success) {
                return response('Delete success!', 200);
            }
            return response('Delete error!', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

    private function saveCoupon($coupon, $request)
    {
        $title = $request->input('title');
        $title_en = $request->input('title_en');
        $title_laos = $request->input('title_laos');

        $description = $request->input('description');
        $description_en = $request->input('description_en');
        $description_laos = $request->input('description_laos');

        $short_description = $request->input('short_description');
        $short_description_en = $request->input('short_description_en');
        $short_description_laos = $request->input('short_description_laos');

        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        $max_register = $request->input('max_register');

        $user_id = $request->input('user_id');

        $clinic_id = $request->input('clinic_id');

        if ($this->isAdmin()) {
            $status = CouponStatus::ACTIVE;
        } else {
            $status = CouponStatus::PENDING;
        }

        $code = 'CP' . $user_id . (new MainController())->generateRandomString(8);

        if ($request->hasFile('thumbnail')) {
            $item = $request->file('thumbnail');
            $itemPath = $item->store('coupon', 'public');
            $thumbnail = asset('storage/' . $itemPath);
        } else {
            $thumbnail = '';
        }

        $coupon->title = $title;
        $coupon->title_en = $title_en;
        $coupon->title_laos = $title_laos;

        $coupon->description = $description;
        $coupon->description_en = $description_en;
        $coupon->description_laos = $description_laos;

        $coupon->short_description = $short_description;
        $coupon->short_description_en = $short_description_en;
        $coupon->short_description_laos = $short_description_laos;

        $coupon->startDate = $startDate;
        $coupon->endDate = $endDate;

        $coupon->max_register = $max_register;

        $coupon->user_id = $user_id;

        $coupon->status = $status;
        $coupon->code = $code;
        $coupon->thumbnail = $thumbnail;
        $coupon->clinic_id = $clinic_id;

        $success = $coupon->save();

        if (!$success) {
            return response('Bad request!', 400);
        }
    }
}
