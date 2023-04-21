<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StokKain;
use App\Models\Produksi;
use App\Models\Kain;

class StokKainController extends Controller
{
    public function store(Request $request)
    {
        $stok_kain = new StokKain;
        if ($request->id_produksi == null && $request->nama_produksi != null) {
            // kalau masukin data lewat text field
            $temp = Produksi::where('NAMA_PRODUKSI', $request->nama_produksi)->first();
            if ($temp) {
                $stok_kain->ID_PRODUKSI = $temp['ID_PRODUKSI'];
            } else {
                $new_prod = new Produksi;
                $new_prod->NAMA_PRODUKSI = $request->nama_produksi;
                $new_prod->save();
                $stok_kain->ID_PRODUKSI = $new_prod->ID_PRODUKSI;
            }
        } else {
            $stok_kain->ID_PRODUKSI = $request->id_produksi;
        }
        if ($request->id_kain == null && $request->nama_kain != null) {
            // kalau masukin data lewat text field
            $temp = Kain::where('NAMA_KAIN', $request->nama_kain)->first();
            if ($temp) {
                $stok_kain->ID_KAIN = $temp['ID_KAIN'];
            } else {
                $new_kain = new Kain;
                $new_kain->NAMA_KAIN = $request->nama_kain;
                $new_kain->save();
                $stok_kain->ID_KAIN = $new_kain->ID_KAIN;
            }
        } else {
            $stok_kain->ID_KAIN = $request->id_kain;
        }

        // trigger ke tabel roll nya (?)
        $stok_kain->TOTAL_ROLL = $request->total_roll;
        $stok_kain->TOTAL_YARD = $request->total_yard;
        $stok_kain->save();

        return redirect('/table/Stok_Kain')->with('success', 'Data berhasil ditambahkan.');
        // dd($request->all());
    }
}
