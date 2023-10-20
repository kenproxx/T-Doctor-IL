<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Role extends Enum
{
//    const BUSINESS = 'BUSINESS MEMBER';
//    const MEDICAL = 'MEDICAL SERVICES';
//    const NORMAL = 'NORMAL MEMBER';

    /*  BUSINESS MEMBER    */
    const PHARMACEUTICAL_COMPANIES = 'PHARMACEUTICAL COMPANIES';
    const HOSPITALS = 'HOSPITALS';
    const CLINICS = 'CLINICS';
    const PHARMACIES = 'PHARMACIES';
    const SPAS = 'SPAS';
    const OTHERS = 'OTHERS';

    /*  MEDICAL SERVICES    */
    const DOCTORS = 'DOCTORS';
    const PHAMACISTS = 'PHAMACISTS';
    const THERAPISTS = 'THERAPISTS';
    const ESTHETICIANS = 'ESTHETICIANS';
    const NURSES = 'NURSES';

    /*  NORMAL MEMBER   */
    const PAITENTS = 'PAITENTS';
    const NORMAL_PEOPLE = 'NORMAL PEOPLE';

    /*  ADMIN   */
    const ADMIN = 'ADMIN';
}
