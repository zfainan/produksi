<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_jadwal
 * @property int $id_perhitungan
 * @property string $tanggal_mulai
 * @property string $tanggal_selesai
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Database\Factories\JadwalProduksiFactory<self> factory($count = null, $state = [])
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 */
class JadwalProduksi extends Model
{
    use HasFactory;

    protected $table = 'jadwal_produksi';

    protected $primaryKey = 'id_jadwal';
}
