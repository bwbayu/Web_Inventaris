<?php

namespace App\Models;

use App\Models\Kain;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Roll extends Model
{
    use HasFactory;
    protected $table = 'ROLL';
    protected $primaryKey = 'ID_ROLL';
    public $timestamps = true;

    protected $fillable = ['ID_KAIN', 'YARD'];

    public function kain()
    {
        return $this->belongsTo(Kain::class, 'ID_KAIN');
    }
}
