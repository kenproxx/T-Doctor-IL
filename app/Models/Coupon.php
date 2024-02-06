<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    public static function getNameCoupon($id)
    {
        $coupon = Coupon::find($id);
        if ($coupon) {
            return $coupon->title;
        }
        return '';
    }
    public static function getNameUser($id)
    {
        $user = User::find($id);
        if ($user) {
            return $user->name;
        }
        return '';
    }
}
