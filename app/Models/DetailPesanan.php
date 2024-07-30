<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static \Database\Factories\DetailPesananFactory<self> factory($count = null, $state = [])
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 *
 * @property      int                             $id_detail_pesanan
 * @property      int                             $id_pesanan
 * @property      int                             $id_produk
 * @property      string                          $jumlah_order
 * @property      string                          $satuan
 * @property      \Illuminate\Support\Carbon|null $created_at
 * @property      \Illuminate\Support\Carbon|null $updated_at
 * @property      float                           $processing_time
 * @property      int|null                        $pesanans_count
 * @property      int|null                        $produks_count
 * @property-read \App\Models\Pesanan|null        $pesanan
 * @property-read \App\Models\Produk|null         $produk
 */
class DetailPesanan extends Model
{
    use HasFactory;

    protected $table = 'detail_pesanan';

    protected $primaryKey = 'id_detail_pesanan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_pesanan',
        'id_produk',
        'jumlah_order',
        'satuan',
        'processing_time',
    ];

    public function pesanan(): BelongsTo
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan', 'id_pesanan');
    }

    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }
}
