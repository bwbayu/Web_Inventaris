<?php

namespace App\Http\Controllers;

use App\Models\Roll;
use App\Models\StokKain;
use App\Models\Transaksi;
use App\Models\StokKertas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function store(Request $request)
    {
        // validasi input request
        $validator = Validator::make(
            $request->all(),
            [
                'id_stok_kain' => 'required',
                'jumlah_kain' => 'required|integer|min:1',
                'id_stok_kertas' => 'required',
                'jumlah_kertas' => 'required|integer|min:1',
                'tanggal' => 'required',
                'keterangan' => 'required',
            ],
            [
                'id_stok_kain.required' => 'Pilih salah satu data stok kain',
                'jumlah_kain.required' => 'Isi jumlah stok kain yang digunakan, minimal 1',
                'jumlah_kain.integer' => 'Jumlah stok kain harus berupa angka',
                'jumlah_kain.min' => 'Jumlah stok kain minimal 1',
                'id_stok_kertas.required' => 'Pilih salah satu data stok kertas',
                'jumlah_kertas.required' => 'Isi jumlah stok kertas yang digunakan, minimal 1',
                'jumlah_kertas.integer' => 'Jumlah stok kertas harus berupa angka',
                'jumlah_kertas.min' => 'Jumlah stok kertas minimal 1',
                'tanggal.required' => 'Tanggal transaksi tidak boleh kosong',
                'keterangan.required' => 'Keterangan transaksi tidak boleh kosong',
            ]
        );

        // STORE DATA PANJANG
        $listPanjang = array();
        for ($i = 0; $i < $request->jumlah_kertas; $i++) {
            if ($request->id_panjang[$i] != null) {
                array_push($listPanjang, $request->id_panjang[$i]);
            }
        }
        // VALIDASI DATA PANJANG
        $counted = array_count_values($listPanjang);
        foreach ($counted as $key => $value) {
            $stok_kertas = StokKertas::findOrFail($key);
            if ($stok_kertas->JUMLAH_KERTAS < $value) {
                $validator->after(function ($validator) {
                    $validator->errors()->add('id_panjang', 'Stok kertas tidak mencukupi');
                });
            }
            // Jika validasi gagal
            if ($validator->fails()) {
                return redirect('/form/Transaksi')
                    ->withErrors($validator)
                    ->withInput();
            }
        }

        // STORE DATA YARD
        $listYard = array(); // tabel roll
        for ($i = 0; $i < $request->jumlah_kain; $i++) {
            if ($request->id_roll[$i] != null) {
                array_push($listYard, $request->id_roll[$i]);
            }
        }

        // VALIDASI DATA PANJANG
        $counted1 = array_count_values($listYard);
        // dd($counted1);
        foreach ($counted1 as $key => $value) {
            $idStokKain = Roll::where('ID_ROLL', $key)->value('ID_STOK_KAIN');
            $yard = Roll::where('ID_ROLL', $key)->value('YARD');
            $count = Roll::where('ID_STOK_KAIN', $idStokKain)->where('YARD', $yard)->count();
            if ($count < $value) {
                $validator->after(function ($validator) {
                    $validator->errors()->add('id_roll', 'Roll kain tidak tersedia');
                });
            }
            // Jika validasi gagal
            if ($validator->fails()) {
                return redirect('/form/Transaksi')
                    ->withErrors($validator)
                    ->withInput();
            }
        }

        // TABEL STOK KERTAS
        foreach ($counted as $key => $value) {
            $stok_kertas = StokKertas::findOrFail($key);
            // PERBARUI DATA JUMLAH KERTAS DI TABEL ID STOK KERTAS
            $stok_kertas->JUMLAH_KERTAS -= $value;
            $stok_kertas->save();
        }

        // TABEL ROLL DAN TRIGGER KE TABEL STOK KAIN
        foreach ($listYard as $temp) {
            $idStokKain = Roll::where('ID_ROLL', $temp)->value('ID_STOK_KAIN');
            $yard = Roll::where('ID_ROLL', $temp)->value('YARD');
            Roll::where('ID_STOK_KAIN', $idStokKain)->where('YARD', $yard)->delete();
        }


        // dd($request->all());
        // TABEL TRANSAKSI
        $transaksi = new Transaksi;
        $transaksi->ID_STOK_KERTAS = $request->id_stok_kertas;
        $transaksi->JUMLAH_KERTAS = $request->jumlah_kertas;
        $transaksi->ID_STOK_KAIN = $request->id_stok_kain;
        $transaksi->JUMLAH_KAIN = $request->jumlah_kain;
        $transaksi->TGL = $request->tanggal;
        $transaksi->KETERANGAN = $request->keterangan;
        $transaksi->save();



        return redirect('/table/Transaksi')->with('success', 'Data berhasil ditambahkan.');
    }
}
