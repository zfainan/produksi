<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalProduksi extends Model
{
    use HasFactory;

    protected $table = 'jadwal_produksi';

    protected $primaryKey = 'id_jadwal';
}
