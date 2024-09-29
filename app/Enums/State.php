<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static TPHCM()
 * @method static static HANOI()
 * @method static static DANANG()
 * @method static static VUNGTAU()
 */
final class State extends Enum
{
    const TPHCM = 1;
    const HANOI = 2;
    const DANANG = 3;
    const VUNGTAU = 4;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::TPHCM:
                return 'TP HCM';
                break;
            case self::HANOI:
                return 'Ha Noi';
                break;
            case self::DANANG:
                return 'Da Nang';
                break;
            case self::VUNGTAU:
                return 'Vung Tau';
                break;
        }

        return parent::getDescription($value);
    }
}
