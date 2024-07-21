<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin \Illuminate\Database\Eloquent\Model
 *
 * @property      int                             $id_detail
 * @property      int                             $id_jadwal
 * @property      int|null                        $id_pesanan
 * @property      float                           $flow_time
 * @property      float                           $lateness
 * @property      float                           $processing_time
 * @property      float                           $due_date
 * @property      \Illuminate\Support\Carbon|null $created_at
 * @property      \Illuminate\Support\Carbon|null $updated_at
 * @property      int|null                        $pesanans_count
 * @property-read \App\Models\Pesanan|null        $pesanan
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
    protected $fillable = ['id_jadwal', 'id_pesanan', 'flow_time', 'lateness', 'processing_time', 'due_date'];

    public function pesanan(): BelongsTo
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan', 'id_pesanan');
    }
}
