<?php

declare(strict_types=1);

namespace App\Enums;

use App\Traits\EnumTrait;

enum SatuanEnum: string
{
    use EnumTrait;

    case Gram = 'Gram';
    case Pieces = 'Pieces';
    case MiliLiter = 'Mili Liter';
}
