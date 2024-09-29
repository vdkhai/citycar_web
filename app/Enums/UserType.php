<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Normal()
 * @method static static Admin()
 */
final class UserType extends Enum
{
    const Normal = 0;
    const Admin = 1;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::Normal:
                return '';
                break;
        }

        return parent::getDescription($value);
    }
}
