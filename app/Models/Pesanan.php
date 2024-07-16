<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_pesanan
 * @property int $id_pelanggan
 * @property string $tanggal_pesan
 * @property string $tanggal_permintaan
 * @property string $tipe_pesanan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Database\Factories\PesananFactory<self> factory($count = null, $state = [])
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 */
class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $primaryKey = 'id_pesanan';
}
