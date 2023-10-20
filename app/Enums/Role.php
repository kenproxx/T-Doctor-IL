<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Role extends Enum
{
    const BUSINESS = 'BUSINESS MEMBER';
    const MEDICAL = 'MEDICAL SERVICES';
    const NORMAL = 'NORMAL MEMBER';
    const ADMIN = 'ADMIN';
}
