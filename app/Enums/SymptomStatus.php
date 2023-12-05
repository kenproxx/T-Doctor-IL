<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class SymptomStatus extends Enum
{
    const ACTIVE = 'ACTIVE';
    const INACTIVE = 'INACTIVE';
    const DELETED = 'DELETED';
}
