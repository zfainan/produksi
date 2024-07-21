<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
 * @property      int|null                                                            $details_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DetailProduk[] $detail
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
    protected $fillable = ['nama_produk', 'kemasan', 'harga'];

    public function detail(): HasMany
    {
        return $this->hasMany(DetailProduk::class, 'id_produk', 'id_produk');
    }
}
