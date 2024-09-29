<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Five()
 * @method static static Seven()
 * @method static static SevenAndAbove()
 */
final class CarSeat extends Enum
{
    const Five = 1;
    const Seven = 2;
    const SevenAndAbove = 3;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::Five:
                return '5';
                break;
            case self::Seven:
                return '7';
                break;
            case self::SevenAndAbove:
                return '7&above';
                break;
        }

        return parent::getDescription($value);
    }
}
