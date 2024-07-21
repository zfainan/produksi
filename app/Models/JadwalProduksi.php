<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Database\Factories\JadwalProduksiFactory<self> factory($count = null, $state = [])
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 *
 * @property int                             $id_jadwal
 * @property string                          $tanggal_mulai
 * @property string                          $tanggal_selesai
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class JadwalProduksi extends Model
{
    use HasFactory;

    protected $table = 'jadwal_produksi';

    protected $primaryKey = 'id_jadwal';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tanggal_mulai', 'tanggal_selesai'];
}
