<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BengkelMaintenance extends Model
{
    protected $table = 'bengkel_maintenance';

    protected $primaryKey = 'id_bengkel';

    public $timestamps = false;

    protected $fillable = [
        'nama_bengkel',
        'lokasi',
        'kontak',
        'jenis_layanan',
        'aksi',
    ];
}
