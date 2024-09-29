<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Petrol()
 * @method static static Diesel()
 * @method static static Other()
 */
final class CarFuelType extends Enum
{
    const Petrol = 1;
    const Diesel = 2;
    const Other = 999;
}
