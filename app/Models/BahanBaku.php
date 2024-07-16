<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_bahan
 * @property string $nama_bahan_baku
 * @property int $stok
 * @property string $satuan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Database\Factories\BahanBakuFactory<self> factory($count = null, $state = [])
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 */
class BahanBaku extends Model
{
    use HasFactory;

    protected $table = 'bahan_baku';

    protected $primaryKey = 'id_bahan';
}
