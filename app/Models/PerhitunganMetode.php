<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_perhitungan_metode
 * @property int $id_pesanan
 * @property float $rrwp
 * @property float $rrjp
 * @property float $utilisasi
 * @property float $rrwk
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Database\Factories\PerhitunganMetodeFactory<self> factory($count = null, $state = [])
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 */
class PerhitunganMetode extends Model
{
    use HasFactory;

    protected $table = 'perhitungan_metode';

    protected $primaryKey = 'id_perhitungan_metode';
}
