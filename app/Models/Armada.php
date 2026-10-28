<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Armada extends Model
{
    protected $table = 'armada_kendaraan';

    protected $primaryKey = 'id_kendaraan';

    public $timestamps = false;

    protected $fillable = [
        'nomor_plat',
        'merk',
        'tahun_pembuatan',
        'transmisi',
        'status',
    ];
}