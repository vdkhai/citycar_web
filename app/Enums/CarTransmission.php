<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Manual()
 * @method static static Automatic()
 */
final class CarTransmission extends Enum
{
    const Manual = 1;
    const Automatic = 2;
}
