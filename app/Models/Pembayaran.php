<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'info_pembayaran';

    protected $fillable = [
        'pel_no',
        'rek_nomor',
        'byr_serial',
        'rek_tgl',
        'rek_bln',
        'rek_thn',
        'rek_bulan',
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
        'rek_jumlah',
        'byr_tgl',
        'byr_upd_sts',
        'Loket'
    ];
}
