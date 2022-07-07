<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pelanggan;
use App\Models\Pembayaran;
use App\Models\Tagihan;

class PelangganController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['infoTagihanPublic']]);
    }

    public function infoTagihanPublic(Request $request)
    {
        // $pelanggan = Pelanggan::where('nomor_sl', $request->no_pelanggan)->first();
        $pelanggan = Pelanggan::where('nomor_sl', $request->no_pelanggan)->get();

        $cekNoPel = Pelanggan::where('nomor_sl', $request->no_pelanggan)->first();
        if(!$cekNoPel) {
            return response()->json([
                'success' => false,
                'msg' => 'No. Pelanggan tidak ditemukan'
            ]);
        }

        $pembayaran = Pembayaran::orderBy('rek_nomor', 'desc')->where('pel_no', $request->no_pelanggan)->take(3)->get();
        $tagihan = Tagihan::orderBy('rek_nomor', 'desc')->where('pel_no', $request->no_pelanggan)->get();


        return response()->json([
            'success' => true,
            'pelanggan' => $pelanggan,
            'tagihan' => $tagihan,
            'riwayat' => $pembayaran
        ], 200);
    }

    public function infoPelanggan($nomor_sl)
    {
        $pelanggan = Pelanggan::where('nomor_sl', $nomor_sl)->first();

        return response()->json([
            'success' => true,
            'pelanggan' => $pelanggan,
        ], 200);
    }

    
}
