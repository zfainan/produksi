<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin \Illuminate\Database\Eloquent\Model
 *
 * @property int                             $id_perhitungan
 * @property int                             $id_jadwal
 * @property float                           $rrwp
 * @property float                           $rrjp
 * @property float                           $utilisasi
 * @property float                           $rrwk
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Perhitungan extends Model
{
    protected $table = 'perhitungan';

    protected $primaryKey = 'id_perhitungan';
}
