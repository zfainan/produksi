<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerhitunganMetode extends Model
{
    use HasFactory;

    protected $table = 'perhitungan_metode';

    protected $primaryKey = 'id_perhitungan_metode';
}
