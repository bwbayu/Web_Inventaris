<?php

namespace App\Models;

use App\Models\Tinta;
use App\Models\StokKain;
use App\Models\StokKertas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'TRANSAKSI';
    protected $primaryKey = 'ID_TRANSAKSI';
    public $timestamps = true;

    protected $fillable = ['ID_TINTA', 'ID_STOK_KERTAS', 'ID_STOK_KAIN', 'TGL', 'KETERANGAN', 'ROLL_TRANSAKSI', 'YARD_TRANSAKSI'];

    public function tinta()
    {
        return $this->belongsTo(Tinta::class, 'ID_TINTA');
    }

    public function stokKertas()
    {
        return $this->belongsTo(StokKertas::class, 'ID_STOK_KERTAS');
    }

    public function stokKain()
    {
        return $this->belongsTo(StokKain::class, 'ID_STOK_KAIN');
    }
}
