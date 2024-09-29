<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static _Private()
 * @method static static _Company()
 */
final class CarRegistrationType extends Enum
{
    const _Private = 1;
    const _Company = 2;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::_Private:
                return 'Private';
                break;
            case self::_Company:
                return 'Company';
                break;
        }

        return parent::getDescription($value);
    }
}
