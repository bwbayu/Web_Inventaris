<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\StokKain;
use App\Models\StokKertas;
use App\Models\Tinta;

class TransaksiController extends Controller
{
    public function store(Request $request)
    {
        dd($request->all());
        $transaksi = new Transaksi;
        $transaksi->ID_TINTA = $request->id_tinta;
        $transaksi->ID_STOK_KERTAS = $request->id_stok_kertas;
        $transaksi->ID_STOK_KAIN = $request->id_stok_kain;
        $transaksi->TGL = $request->tgl;
        $transaksi->KETERANGAN = $request->keterangan;
        // $transaksi->save();
        // return redirect('/table/Transaksi')->with('success', 'Data berhasil ditambahkan.');
    }
}
