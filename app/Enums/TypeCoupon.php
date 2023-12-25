<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class TypeCoupon extends Enum
{
    const FREE_TODAY = 'FREE TODAY';
    const FREE_MISSION = 'FREE WITH MISSION';
    const DISCOUNT_SERVICE = 'DISCOUNT SERVICE';
}
