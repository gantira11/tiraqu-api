<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'info_pelanggan';

    protected $fillable = [
        'kota_pelayanan',
        'nomor_sl',
        'nama',
        'alamat',
        'golongan',
        'rayon',
        'status',
        'jml_rek',
        'jml_rupiah',
        'jml_denda',
        'jml_piutang'
    ];
}
