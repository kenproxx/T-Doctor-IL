<?php

namespace App\Http\Controllers\backend;

use App\Enums\CouponApplyStatus;
use App\Enums\CouponStatus;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Models\Coupon;
use App\Models\CouponApply;
use App\Models\SocialUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BackendCouponApplyController extends Controller
{
    public function getAll(Request $request)
    {
        $status = $request->input('status');
        if ($status) {
            $couponApplies = CouponApply::where('status', $status)->get();
        } else {
            $couponApplies = CouponApply::where('status', '!=', CouponApplyStatus::DELETED)->get();
        }
        return response()->json($couponApplies);
    }

    public function getAllByUser(Request $request, $id)
    {
        $status = $request->input('status');
        if ($status) {
            $couponApplies = CouponApply::where('status', $status)->where('user_id', $id)->get();
        } else {
            $couponApplies = CouponApply::where('status', '!=', CouponApplyStatus::DELETED)->where('user_id',
                $id)->get();
        }
        return response()->json($couponApplies);
    }

    public function detail($id)
    {
        $couponApply = CouponApply::find($id);
        if (!$couponApply || $couponApply->status == CouponApplyStatus::DELETED) {
            return response('Not found', 404);
        }
        return response()->json($couponApply);
    }

    public function create(Request $request)
    {
        try {
            $couponApply = new CouponApply();

            $name = $request->input('name');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $content = $request->input('content');
            $user_id = $request->input('user_id');
            $coupon_id = $request->input('coupon_id');
            $sns_option = $request->input('sns_option');

            //check sns option not null
            if (!$sns_option) {
                return response('thiếu thông tin mạng xã hội, hãy vào trang cá nhân để cập nhật', 400);
            }
            // kiểm tra name, email, phone, content not null
            if (!$name || !$email || !$phone || !$content) {
                return response('Nhập thiếu thông tin rồi', 400);
            }

            $link = SocialUser::where('user_id', $user_id)->first($sns_option);

            $couponApply->name = $name;
            $couponApply->email = $email;
            $couponApply->phone = $phone;
            $couponApply->content = $content;
            $couponApply->user_id = $user_id;
            $couponApply->coupon_id = $coupon_id;
            $couponApply->sns_option = $sns_option;
            $couponApply->link_ = $link[$sns_option];
            $couponApply->status = CouponApplyStatus::PENDING;

            $coupon = Coupon::find($coupon_id);
            if (!$coupon || $coupon->status != CouponStatus::ACTIVE) {
                return response('Coupon not found!', 404);
            }

            $coupon->registered = $coupon->registered + 1;

            $success = $couponApply->save();

            (new MailController())->sendEmail($email, 'support.il.vietnam@gmail.com', 'Register success',
                'Thank you for taking the time to consider our services');

            if ($success) {
                $coupon->save();
                return response()->json($couponApply);
            }
            return response('Create error!', 400);
        } catch (Exception $exception) {
            return response($exception, 400);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $couponApply = CouponApply::find($id);
            if (!$couponApply || $couponApply->status == CouponApplyStatus::DELETED) {
                return response('Not found', 404);
            }

            $name = $request->input('name');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $content = $request->input('content');
            $user_id = $request->input('user_id');
            $coupon_id = $request->input('coupon_id');

            $newCheck = false;
            if ($coupon_id == $couponApply->coupon_id) {
                $newCheck = true;
            }

            $couponApply->name = $name;
            $couponApply->email = $email;
            $couponApply->phone = $phone;
            $couponApply->content = $content;
            $couponApply->user_id = $user_id;

            if ($newCheck == false) {
                $couponApply->coupon_id = $coupon_id;

                $coupon = Coupon::find($coupon_id);
                if (!$coupon || $coupon->status != CouponStatus::ACTIVE) {
                    return response('Coupon not found!', 404);
                }

                if ($coupon->max_register == 0) {
                    return response('The number of subscribers has reached the maximum!', 400);
                }

                if ($coupon->endDate > Carbon::now()->addHours(7) && $coupon->startDate < Carbon::now()->addHours(7)) {
                    $coupon->registered = $coupon->registered + 1;
                    $coupon->max_register = $coupon->max_register - 1;

                    if ($coupon->max_register == 0) {
                        $coupon->status = CouponStatus::INACTIVE;
                    }

                    $success = $couponApply->save();

                    if ($success) {
                        $coupon->save();
                        return response()->json($couponApply);
                    }
                    return response('Update error!', 400);
                }
                return response('Coupon not active!', 400);
            }

            $success = $couponApply->save();
            if ($success) {
                return response()->json($couponApply);
            }
            return response('Update error!', 400);
        } catch (Exception $exception) {
            return response($exception, 400);
        }
    }

    public function delete($id)
    {
        try {
            $couponApply = CouponApply::find($id);
            if (!$couponApply || $couponApply->status == CouponApplyStatus::DELETED) {
                return response('Not found', 404);
            }

            $couponApply->status = CouponApplyStatus::DELETED;

            $coupon = Coupon::find($couponApply->coupon_id);

            if ($coupon->endDate > Carbon::now()->addHours(7) && $coupon->startDate < Carbon::now()->addHours(7)) {
                $coupon->registered = $coupon->registered - 1;
                $coupon->max_register = $coupon->max_register + 1;
                $coupon->save();
            }

            $success = $couponApply->save();
            if ($success) {
                return response('Delete success!', 200);
            }
            return response('Delete error!', 400);
        } catch (Exception $exception) {
            return response($exception, 400);
        }
    }

    public function updateStatus(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');

        $couponApply = CouponApply::find($id);
        if (!$couponApply) {
            return response('Not found', 404);
        }

        if ($couponApply->status == CouponApplyStatus::REWARDED) {
            return response('Không thể thay đổi trạng thái của bài đã trao giải', 400);
        }

        if ($status == CouponApplyStatus::REWARDED) {
            if ($couponApply->status == CouponApplyStatus::VALID) {
                $isMaxReward = $this->checkMaxRewardCoupon($couponApply->coupon_id);
                if ($isMaxReward) {
                    return response('Đã đủ số lượng trúng thưởng', 400);
                }
                $couponApply->status = CouponApplyStatus::REWARDED;
                $this->sendMailWhenReward($couponApply);
            } else {
                return response('Không thể trao giải cho bài không hợp lệ', 400);
            }
        } else {
            $couponApply->status = $status;
        }
        $couponApply->save();
        return response('Thay đổi thành công', 200);
    }

    public function checkMaxRewardCoupon($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $maxReward = $coupon->max_register;

        $couponApply = CouponApply::where('coupon_id', $coupon_id)->where('status', CouponApplyStatus::REWARDED)->count();
        if ($couponApply >= $maxReward) {
            return true;
        }
        return false;

    }

    public function sendMailWhenReward($couponApply)
    {
        $coupon = Coupon::where('id', $couponApply->coupon_id)->first();
        $donViPhatHanh = $coupon->user_id;

        $emailNguoiDungApply = $couponApply->email ?? '';
        $emailDonViPhatHanh = User::where('id', $donViPhatHanh)->first()->email ?? '';
        $emailAdmin = '';

        $emailFrom = 'support.il.vietnam@gmail.com';
        $title = 'Thông báo trúng thưởng';
        $content = 'Chúc mừng bạn đã trúng thưởng';

        $listEmail = [];
        array_push($listEmail, $emailNguoiDungApply);
        array_push($listEmail, $emailDonViPhatHanh);
        array_push($listEmail, $emailAdmin);

        $mailController = new MailController();
        foreach ($listEmail as $email) {
            if ($email) {
                $mailController->sendEmail($email, $emailFrom, $title, $content);
            }
        }
    }

}
