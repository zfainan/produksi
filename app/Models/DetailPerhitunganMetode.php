<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPerhitunganMetode extends Model
{
    use HasFactory;

    protected $table = 'detail_perhitungan_metode';

    protected $primaryKey = 'id_detail_perhitungan_metode';
}
