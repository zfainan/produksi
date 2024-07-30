<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static \Database\Factories\PesananFactory<self> factory($count = null, $state = [])
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 *
 * @property      int                                                                         $id_pesanan
 * @property      int                                                                         $id_pelanggan
 * @property      string                                                                      $tanggal_pesan
 * @property      string                                                                      $tanggal_permintaan
 * @property      string                                                                      $tipe_pesanan
 * @property      \Illuminate\Support\Carbon|null                                             $created_at
 * @property      \Illuminate\Support\Carbon|null                                             $updated_at
 * @property      float|null                                                                  $total_processing_time
 * @property      int|null                                                                    $pelanggans_count
 * @property      int|null                                                                    $details_count
 * @property      int|null                                                                    $detail_jadwals_count
 * @property      int|null                                                                    $pengajuan_bahans_count
 * @property-read \App\Models\Pelanggan|null                                                  $pelanggan
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DetailPesanan[]        $detail
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DetailJadwalProduksi[] $detailJadwal
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PengajuanBahanBaku[]   $pengajuanBahan
 */
class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $primaryKey = 'id_pesanan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_pelanggan', 'tanggal_pesan', 'tanggal_permintaan', 'tipe_pesanan', 'total_processing_time'];

    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }

    public function detail(): HasMany
    {
        return $this->hasMany(DetailPesanan::class, 'id_pesanan', 'id_pesanan');
    }

    public function detailJadwal(): HasMany
    {
        return $this->hasMany(DetailJadwalProduksi::class, 'id_pesanan', 'id_pesanan');
    }

    public function pengajuanBahan(): HasMany
    {
        return $this->hasMany(PengajuanBahanBaku::class, 'id_pesanan', 'id_pesanan');
    }
}
