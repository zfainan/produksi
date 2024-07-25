<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static \Database\Factories\PengajuanBahanBakuFactory<self> factory($count = null, $state = [])
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 *
 * @property      int                             $id_pengajuan
 * @property      int                             $id_pesanan
 * @property      int                             $id_user
 * @property      int                             $id_bahan
 * @property      string                          $tanggal_pengajuan
 * @property      int                             $jumlah
 * @property      \Illuminate\Support\Carbon|null $created_at
 * @property      \Illuminate\Support\Carbon|null $updated_at
 * @property      bool                            $approved
 * @property      int|null                        $bahans_count
 * @property-read \App\Models\BahanBaku|null      $bahan
 */
class PengajuanBahanBaku extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_bahan_baku';

    protected $primaryKey = 'id_pengajuan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_pesanan', 'id_bahan', 'jumlah'];

    public function bahan(): BelongsTo
    {
        return $this->belongsTo(BahanBaku::class, 'id_bahan', 'id_bahan');
    }
}
