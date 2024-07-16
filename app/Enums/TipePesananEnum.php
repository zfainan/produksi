<?php

declare(strict_types=1);

namespace App\Enums;

use App\Traits\EnumTrait;

enum TipePesananEnum: string
{
    use EnumTrait;

    case Prioritas = 'Prioritas';
    case Reguler = 'Reguler';
}
