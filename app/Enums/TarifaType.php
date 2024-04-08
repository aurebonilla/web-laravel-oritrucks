<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self estandar()
 * @method static self premium()
 */
final class TarifaType extends Enum
{
    const Estandar = 'ESTANDAR';
    const Premium = 'PREMIUM';

    /**
     * @method static self estandar()
     * @method static self premium()
     */
}