<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketRental extends Model
{
    protected $table = 'paket_rental';

    protected $primaryKey = 'id_paket';

    public $timestamps = false;

    protected $fillable = [
        'nama_paket',
        'durasi_sewa',
        'ketentuan',
    ];
}