<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin \Illuminate\Database\Eloquent\Model
 *
 * @property int                             $id_detail
 * @property int                             $id_jadwal
 * @property int                             $id_pesanan
 * @property float                           $flow_time
 * @property float                           $lateness
 * @property float                           $processing_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class DetailJadwalProduksi extends Model
{
    protected $table = 'detail_jadwal_produksi';

    protected $primaryKey = 'id_detail';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_jadwal', 'id_pesanan', 'flow_time', 'lateness', 'processing_time'];
}
