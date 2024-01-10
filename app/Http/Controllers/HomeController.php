<?php

namespace App\Http\Controllers;

use App\Enums\BookingStatus;
use App\Enums\CouponApplyStatus;
use App\Enums\CouponStatus;
use App\Enums\MessageStatus;
use App\Enums\online_medicine\OnlineMedicineStatus;
use App\Enums\ProductStatus;
use App\Enums\ReviewStatus;
use App\Enums\SettingStatus;
use App\Enums\UserStatus;
use App\Models\Booking;
use App\Models\Chat;
use App\Models\Clinic;
use App\Models\Coupon;
use App\Models\CouponApply;
use App\Models\online_medicine\ProductMedicine;
use App\Models\ProductInfo;
use App\Models\Review;
use App\Models\Setting;
use App\Models\User;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
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
        $productsFlea = ProductInfo::where('status', ProductStatus::ACTIVE)->get();
        $medicines = ProductMedicine::where('product_medicines.status', OnlineMedicineStatus::APPROVED)
            ->leftJoin('users', 'product_medicines.user_id', '=', 'users.id')
            ->leftJoin('provinces', 'provinces.id', '=', 'users.province_id')
            ->select('product_medicines.*', 'provinces.name as location_name')
            ->paginate(15);
        return view('home', compact('coupons', 'products', 'medicines', 'productsFlea'));
    }
    public function specialist()
    {
        $departments = \App\Models\Department::where('status', \App\Enums\DepartmentStatus::ACTIVE)->get();
        return view('chuyen-khoa.tab-chuyen-khoa-newHome', compact('departments'));
    }
    public function specialistDepartment($id)
    {
        $doctorsSpecial = \App\Models\User::where('department_id', $id)
            ->where('status', \App\Enums\UserStatus::ACTIVE)
            ->paginate(12);
        $clinics = \App\Models\Clinic::where('department', $id)
            ->where('type', \App\Enums\TypeBusiness::CLINICS)
            ->where('status', \App\Enums\ClinicStatus::ACTIVE)
            ->get();
        $pharmacies = \App\Models\Clinic::where('department', $id)
            ->where('type', \App\Enums\TypeBusiness::PHARMACIES)
            ->where('status', \App\Enums\ClinicStatus::ACTIVE)
            ->get();
        return view('chuyen-khoa.danh-sach-theo-chuyen-khoa', compact('id', 'doctorsSpecial', 'clinics', 'pharmacies'));
    }
    public function specialistDetail($id)
    {
        $clinicDetail = \App\Models\Clinic::where('id', $id)->first();
        return view('chuyen-khoa.detail-clinic-pharmacies',compact('clinicDetail','id'));
    }

    public function specialistReview(Request $request, $id)
    {
        $clinic = Clinic::find($id);
        $cmt_review = $request->input('cmt_review');
        $star_number = $request->input('star_number');
        $cmt_store = new Review();
        $cmt_store->star = $star_number;
        $cmt_store->content = $cmt_review;
        $cmt_store->clinic_id = $id;
        $cmt_store->status = ReviewStatus::APPROVED;
        if (!Auth::user()==null) {
            $cmt_store->user_id = auth()->user()->id;
            $cmt_store->name = $clinic->name;
            $cmt_store->address = $clinic->address;
            $cmt_store->phone = $clinic->phone;
            $cmt_store->email = $clinic->email;
            $cmt_store->save();
            alert()->success('Đánh giá thành công');
            return redirect()->route('home.specialist.detail', $id);
        }else{
            alert()->error('Bạn cần đăng nhập để đánh giá');
            return redirect()->route('home.specialist.detail', $id);
        }
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
        $users = User::where('manager_id', Auth::id())->where('status', '!=', UserStatus::DELETED)->paginate(20);
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
