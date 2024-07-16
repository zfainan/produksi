<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Database\Factories\PengajuanBahanBakuFactory<self> factory($count = null, $state = [])
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 *
 * @property int                             $id_pengajuan
 * @property int                             $id_pesanan
 * @property int                             $id_user
 * @property int                             $id_bahan
 * @property string                          $tanggal_pengajuan
 * @property int                             $jumlah
 * @property string                          $satuan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class PengajuanBahanBaku extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_bahan_baku';

    protected $primaryKey = 'id_pengajuan';
}
