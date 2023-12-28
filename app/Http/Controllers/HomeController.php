<?php

namespace App\Http\Controllers;

use App\Enums\BookingStatus;
use App\Enums\CouponApplyStatus;
use App\Enums\CouponStatus;
use App\Enums\MessageStatus;
use App\Enums\online_medicine\OnlineMedicineStatus;
use App\Enums\ProductStatus;
use App\Enums\SettingStatus;
use App\Models\Booking;
use App\Models\Chat;
use App\Models\Coupon;
use App\Models\CouponApply;
use App\Models\online_medicine\ProductMedicine;
use App\Models\ProductInfo;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use ReflectionClass;

class HomeController extends Controller
{

    public function index()
    {
        if (!Auth::check()) {
            setCookie('accessToken', null);
        }
        $coupons = Coupon::where('status', CouponStatus::ACTIVE)->paginate(6);
        $products = ProductInfo::where('status', ProductStatus::ACTIVE)->paginate(12);
        $medicines = ProductMedicine::where('product_medicines.status', OnlineMedicineStatus::APPROVED)
            ->leftJoin('users', 'product_medicines.user_id', '=', 'users.id')
            ->leftJoin('provinces', 'provinces.id', '=', 'users.province_id')
            ->select('product_medicines.*', 'provinces.name as location_name')
            ->paginate(15);
        foreach ($medicines as $medicine) {

        }
        return view('home', compact('coupons', 'products', 'medicines', 'medicine'));
    }

    public function admin()
    {
        return view('admin.home-admin');
    }

    public function listMessageUnseen()
    {
        // lấy tất cả tin nhắn chua doc cua user hien tai
        $messages = Chat::where([
            ['to_user_id', Auth::id()],
            ['message_status', MessageStatus::UNSEEN]
        ])->orderBy('created_at', 'desc')->get();
        $messages->map(function ($message) use ($messages) {

            $message->name_from = User::getNameByID($message->from_user_id);
            $message->avt = User::getAvtByID($message->from_user_id);
            $message->chat_message = $this->limitText($message->chat_message);
            $message->timeAgo = $this->textTimeAgo($message->created_at);
            $message->total = $messages->count();

        });

        return response()->json([
            'messages' => $messages,
        ]);
    }

    private function limitText($text, $maxLength = 255, $ellipsis = '...')
    {
        if (strlen($text) <= $maxLength) {
            return $text;
        } else {
            return substr($text, 0, $maxLength) . $ellipsis;
        }
    }

    private function textTimeAgo($createdAt)
    {
        $now = now();
        $timeDifference = $now->diffInMinutes($createdAt);

        if ($timeDifference < 60) {
            // Nếu thời gian nhỏ hơn 1 giờ
            $timeAgo = $timeDifference . ' phút trước';
        } elseif ($timeDifference >= 60 && $timeDifference < 1440) {
            // Nếu thời gian từ 1 giờ đến 24 giờ
            $hours = floor($timeDifference / 60);
            $timeAgo = $hours . ' giờ trước';
        } else {
            // Nếu thời gian sau 24 giờ
            $days = floor($timeDifference / 1440);
            $timeAgo = $days . ' ngày trước';
        }
        return $timeAgo;
    }

    public function userOnlineStatus()
    {
        if (!Auth::check()) {
            return null;
        }

        $users = User::where('id', '!=', Auth::id())->get();
        $listUserOnline = [];
        foreach ($users as $user) {
            if (Cache::has('user-is-online|' . $user->id)) {
                array_push($listUserOnline, $user);
            }
        }
        return $listUserOnline;
    }

    public function listProduct()
    {
        return view('admin.product.list-product');
    }

    public function listClinics()
    {
        $reflector = new ReflectionClass('App\Enums\TypeBusiness');
        $types = $reflector->getConstants();
        return view('admin.clinic.list-clinics', compact('types'));
    }

    public function listCoupon()
    {
        return view('admin.coupon.list-coupon');
    }

    public function listApplyCoupon($id)
    {
        $applyCoupons = CouponApply::where('coupon_id', $id)
            ->where('status', '!=', CouponApplyStatus::DELETED)
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('admin.coupon.tab-list-apply-coupon', compact('applyCoupons'));
    }

    public function listDoctor()
    {
        $reflector = new ReflectionClass('App\Enums\TypeMedical');
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
        $bookings = Booking::where('status', '!=', BookingStatus::DELETE)
            ->orderBy('id', 'desc')
            ->paginate(20);

        return view('admin.booking.list-booking', compact('bookings'));
    }

}
