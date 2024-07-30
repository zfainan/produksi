<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static \Database\Factories\ProdukFactory<self> factory($count = null, $state = [])
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 *
 * @property      int                                                                 $id_produk
 * @property      string                                                              $nama_produk
 * @property      string                                                              $kemasan
 * @property      int                                                                 $harga
 * @property      \Illuminate\Support\Carbon|null                                     $created_at
 * @property      \Illuminate\Support\Carbon|null                                     $updated_at
 * @property      int|null                                                            $production_per_day
 * @property      int|null                                                            $details_count
 * @property      int|null                                                            $bahans_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DetailProduk[] $detail
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BahanBaku[]    $bahan
 */
class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $primaryKey = 'id_produk';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama_produk', 'kemasan', 'harga', 'production_per_day'];

    public function detail(): HasMany
    {
        return $this->hasMany(DetailProduk::class, 'id_produk', 'id_produk');
    }

    public function bahan(): BelongsToMany
    {
        return $this->belongsToMany(BahanBaku::class, 'detail_produk', 'id_produk', 'id_bahan');
    }
}
