<?php declare(strict_types=1);

namespace App\Enums\online_medicine;

use BenSampo\Enum\Enum;

final class FilterOnlineMedicine extends Enum
{
    const ALL = 'ALL';
    const HEALTH = 'HEALTH';
    const BEAUTY = 'BEAUTY';
    const PET = 'PET';

    const NAME = [
        self::ALL => 'Tất cả',
        self::HEALTH => 'Sức khỏe',
        self::BEAUTY => 'Làm đẹp',
        self::PET => 'Thú cưng',
    ];
    const NAME_EN = [
        self::ALL => 'All',
        self::HEALTH => 'Health',
        self::BEAUTY => 'Beauty',
        self::PET => 'Pet',
    ];
}
