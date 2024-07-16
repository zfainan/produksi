<?php

namespace App\Enums;

use App\Traits\EnumTrait;

enum KemasanEnum: string
{
    use EnumTrait;

    case Box = 'box';
    case Punch = 'pouch';
}
