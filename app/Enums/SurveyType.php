<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class SurveyType extends Enum
{
    const TEXT = 'TEXT';
    const MULTIPLE = 'MULTIPLE';
    const BOOL = 'BOOL';
    const RADIO = 'RADIO';
}
