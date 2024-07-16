<?php

namespace App\Enums;

use App\Traits\EnumTrait;

enum TipePesananEnum: string
{
    use EnumTrait;

    case Prioritas = 'Prioritas';
    case Reguler = 'Reguler';
}
