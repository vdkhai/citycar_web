<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Sedan()
 * @method static static SUV()
 * @method static static MPV()
 * @method static static Hatchback()
 * @method static static Couple()
 * @method static static Truck()
 * @method static static Wagon()
 * @method static static Convertible()
 *  @method static static Van()
 */
final class CarBodyType extends Enum
{
    const Sedan = 1;
    const SUV = 2;
    const MPV = 3;
    const Hatchback = 4;
    const Couple = 5;
    const Truck = 6;
    const Wagon = 7;
    const Convertible = 8;
    const Van = 9;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::SUV:
                return 'SUV';
                break;
            case self::MPV:
                return 'MPV';
                break;
        }

        return parent::getDescription($value);
    }
}
