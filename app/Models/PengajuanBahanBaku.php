<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanBahanBaku extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_bahan_baku';

    protected $primaryKey = 'id_pengajuan';
}
