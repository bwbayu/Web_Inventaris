<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TintaRequest;
use App\Models\Tinta;
use App\Models\Volume;
use App\Models\Warna;

class TintaController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $tinta = new Tinta;
        // WARNA
        if ($request->id_warna == null && $request->nama_warna != null) {
            // kalau masukin data lewat text field
            $temp = Warna::where('NAMA_WARNA', $request->nama_warna)->first();
            if ($temp) {
                $tinta->ID_WARNA = $temp['ID_WARNA'];
            } else {
                $new_warna = new Warna;
                $new_warna->NAMA_WARNA = $request->nama_warna;
                $new_warna->save();
                $tinta->ID_WARNA = $new_warna->ID_WARNA;
            }
        } else {
            $tinta->ID_WARNA = $request->id_warna;
        }
        // VOLUME
        if ($request->id_volume == null && $request->volume != null) {
            // kalau masukin data lewat text field
            $temp = Volume::where('VOLUME', $request->volume)->first();
            if ($temp) {
                $tinta->ID_VOLUME = $temp['ID_VOLUME'];
            } else {
                $new_vol = new Volume;
                $new_vol->VOLUME = $request->volume;
                $new_vol->save();
                $tinta->ID_VOLUME = $new_vol->ID_VOLUME;
            }
        } else {
            $tinta->ID_VOLUME = $request->id_volume;
        }

        // JUMLAH TINTA
        $tinta->JUMLAH_TINTA = $request->jumlah_tinta;
        $tinta->save();

        return redirect('/table/Tinta')->with('success', 'Data berhasil ditambahkan.');
    }
}
