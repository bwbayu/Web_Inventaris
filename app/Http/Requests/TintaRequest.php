<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TintaRequest extends FormRequest
{
    public function authorize()
    {
        return false;
    }


    public function rules()
    {
        return [
            'id_warna' => 'required_without:nama_warna',
            'nama_warna' => 'required_without:id_warna',
            'id_volume' => 'required_without:volume',
            'volume' => 'required_without:id_volume',
            'jumlah_tinta' => 'required|numeric',
        ];
    }
}
