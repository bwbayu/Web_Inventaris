<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Tinta;

class TintaController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make(
            $request->all(),
            [
                'id_tinta' => 'required',
                'jumlah_tinta' => 'required|integer|min:1',
            ],
            [
                'id_tinta.required' => 'Pilih salah satu data tinta',
                'jumlah_tinta.required' => 'Jumlah tinta tidak boleh kosong',
            ]
        );

        // Cek JUMLAH_TINTA pada tinta
        $tinta = Tinta::findOrFail($request->id_tinta);
        if ($tinta->JUMLAH_TINTA < $request->jumlah_tinta) {
            $validator->after(function ($validator) {
                $validator->errors()->add('jumlah_tinta', 'Jumlah tinta melebihi stok yang tersedia.');
            });
        }

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect('/form/Tinta')
                ->withErrors($validator)
                ->withInput();
        }

        // Perbarui kolom JUMLAH_TINTA pada tinta
        $tinta->JUMLAH_TINTA -= $request->jumlah_tinta;
        $tinta->save();

        return redirect('/table/Tinta');
    }
}
