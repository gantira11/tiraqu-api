<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $table = 'info_tagihan';

    protected $fillable = [
        'pel_no',
        'rek_nomor',
        'rek_tgl',
        'rek_bulan',
        'rek_bln',
        'rek_thn',
        'rek_stanlalu',
        'rek_stankini',
        'rek_pemair',
        'rek_uangair',
        'rek_adm',
        'rek_meter',
        'rek_denda',
        'rek_materai',
        'rek_angsuran',
        'rek_total',
        'rek_jumlah'
    ];
}
