<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static \Database\Factories\DetailProdukFactory<self> factory($count = null, $state = [])
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 *
 * @property      int                             $id_detail_produk
 * @property      int                             $id_produk
 * @property      int                             $id_bahan
 * @property      int                             $jumlah
 * @property      \Illuminate\Support\Carbon|null $created_at
 * @property      \Illuminate\Support\Carbon|null $updated_at
 * @property      int|null                        $bahans_count
 * @property      int|null                        $produks_count
 * @property-read \App\Models\BahanBaku|null      $bahan
 * @property-read \App\Models\Produk|null         $produk
 */
class DetailProduk extends Model
{
    use HasFactory;

    protected $table = 'detail_produk';

    protected $primaryKey = 'id_detail_produk';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_produk', 'id_bahan', 'jumlah'];

    public function bahan(): BelongsTo
    {
        return $this->belongsTo(BahanBaku::class, 'id_bahan', 'id_bahan');
    }

    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }
}
