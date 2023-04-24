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
        // validasi input request
        $request->validate(
            [
                'id_kain' => 'required_without:nama_kain',
                'nama_kain' => 'required_without:id_kain',
                'id_produksi' => 'required_without:nama_produksi',
                'nama_produksi' => 'required_without:id_produksi',
                'total_roll' => 'required|integer|min:1',
                'total_yard' => 'required|numeric|min:1',
            ],
            [
                'id_kain' => 'Pilih salah satu kain atau gunakan switch button untuk mengisi kain secara manual',
                'nama_kain' => 'Isi kain secara manual atau gunakan switch button untuk memilih kain',
                'id_produksi' => 'Pilih salah satu produksi atau gunakan switch button untuk mengisi produksi secara manual',
                'nama_produksi' => 'Isi data produksi secara manual atau gunakan switch button untuk memilih data produksi',
                'total_roll' => 'Total roll tidak boleh kosong',
                'total_yard' => 'Total yard tidak boleh kosong',
            ]
        );
        // CEK DATA KAIN DARI FORM DI TABEL KAIN
        $temp_kain = $request->id_kain; // nyimpen id kain
        if ($temp_kain == null) {
            if (Kain::where('NAMA_KAIN', $request->nama_kain)->first()) {
                $temp_kain = Kain::where('NAMA_KAIN', $request->nama_kain)->value('ID_KAIN');
            }
        }

        // CEK DATA PRODUKSI DARI FORM DI TABEL PRODUKSI
        $temp_prod = $request->id_produksi; // nyimpen id produksi
        if ($temp_prod == null) {
            if (Produksi::where('NAMA_PRODUKSI', $request->nama_produksi)->first()) {
                $temp_prod = Produksi::where('NAMA_PRODUKSI', $request->nama_produksi)->value('ID_PRODUKSI');
            }
        }

        if (StokKain::where('ID_KAIN', $temp_kain)->where('ID_PRODUKSI', $temp_prod)->first()) {
            $id_stok_kain = StokKain::where('ID_KAIN', $temp_kain)->where('ID_PRODUKSI', $temp_prod)->value('ID_STOK_KAIN');
            $stok_kain = StokKain::findOrFail($id_stok_kain);

            // perbarui kolom total pada tabel stok kain
            $stok_kain->TOTAL_ROLL += $request->total_roll;
            $stok_kain->TOTAL_YARD += $request->total_yard;
            $stok_kain->save();
            // dd($id_stok_kain);
        } else {
            $stok_kain = new StokKain;
            if ($temp_kain == null) {
                $new_kain = new Kain;
                $new_kain->NAMA_KAIN = $request->nama_kain;
                $new_kain->save();
                $temp_kain = $new_kain->ID_KAIN;
            }

            if ($temp_prod == null) {
                $new_prod = new Produksi;
                $new_prod->NAMA_PRODUKSI = $request->nama_produksi;
                $new_prod->save();
                $temp_prod = $new_prod->ID_PRODUKSI;
            }

            // ASSIGN DATA
            $stok_kain->ID_KAIN = $temp_kain;
            $stok_kain->ID_PRODUKSI = $temp_prod;
            // trigger ke tabel roll (?)
            $stok_kain->TOTAL_ROLL = $request->total_roll;
            $stok_kain->TOTAL_YARD = $request->total_yard;
            $stok_kain->save();
        }

        return redirect('/table/Stok_Kain')->with('success', 'Data berhasil ditambahkan.');
    }
}
