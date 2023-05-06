<?php

namespace App\Http\Controllers;

use App\Models\Roll;
use Illuminate\Http\Request;

class RollController extends Controller
{
    public function getRolls($idStokKain)
    {
        $rolls = Roll::where('ID_STOK_KAIN', $idStokKain)->get();
        return response()->json($rolls);
    }
}
