<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StokKertas;
use App\Models\Kertas;
use App\Models\Berat;

class StokKertasController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $stok_kertas = new StokKertas;
        // KERTAS
        if ($request->id_kertas == null && $request->nama_kertas != null) {
            // kalau masukin data lewat text field
            $temp = Kertas::where('NAMA_KERTAS', $request->nama_kertas)->first();
            if ($temp) {
                $stok_kertas->ID_KERTAS = $temp['ID_KERTAS'];
            } else {
                $new_kertas = new Kertas;
                $new_kertas->NAMA_KERTAS = $request->nama_kertas;
                $new_kertas->save();
                $stok_kertas->ID_KERTAS = $new_kertas->ID_KERTAS;
            }
        } else {
            $stok_kertas->ID_KERTAS = $request->id_kertas;
        }

        // BERAT
        if ($request->id_berat == null && $request->berat != null) {
            // data lewat text field
            $temp = Berat::where('BERAT', $request->berat)->first();
            if ($temp) {
                $stok_kertas->ID_BERAT = $temp['ID_BERAT'];
            } else {
                $new_berat = new Berat;
                $new_berat->BERAT = $request->berat;
                $new_berat->save();
                $stok_kertas->ID_BERAT = $new_berat->ID_BERAT;
            }
        } else {
            $stok_kertas->ID_BERAT = $request->id_berat;
        }

        // PANJANG, LEBAR, JUMLAH KERTAS
        $stok_kertas->PANJANG = $request->panjang;
        $stok_kertas->LEBAR = $request->lebar;
        $stok_kertas->JUMLAH_KERTAS = $request->jumlah_kertas;
        $stok_kertas->save();

        return redirect('/table/Stok_Kertas')->with('success', 'Data berhasil ditambahkanl.');
    }
}
