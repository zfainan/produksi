<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static \Database\Factories\JadwalProduksiFactory<self> factory($count = null, $state = [])
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 *
 * @property      int                                                                         $id_jadwal
 * @property      string                                                                      $tanggal_mulai
 * @property      string                                                                      $tanggal_selesai
 * @property      \Illuminate\Support\Carbon|null                                             $created_at
 * @property      \Illuminate\Support\Carbon|null                                             $updated_at
 * @property      int|null                                                                    $details_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DetailJadwalProduksi[] $detail
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

    public function detail(): HasMany
    {
        return $this->hasMany(DetailJadwalProduksi::class, 'id_jadwal', 'id_jadwal');
    }
}
