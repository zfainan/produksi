<?php

namespace App\Enums;

use App\Traits\EnumTrait;

enum JabatanEnum: string
{
    use EnumTrait;

    case Administrator = 'Administrator';
    case Owner = 'Owner';
    case ProductionManager = 'Penanggung Jawab Produksi';
    case WarehouseHead = 'Kepala Gudang';
}
