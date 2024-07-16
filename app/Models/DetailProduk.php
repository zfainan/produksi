<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Database\Factories\DetailProdukFactory<self> factory($count = null, $state = [])
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 *
 * @property int                             $id_detail_produk
 * @property int                             $id_produk
 * @property int                             $id_bahan
 * @property int                             $jumlah
 * @property string                          $satuan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class DetailProduk extends Model
{
    use HasFactory;

    protected $table = 'detail_produk';

    protected $primaryKey = 'id_detail_produk';
}
