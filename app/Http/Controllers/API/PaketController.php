<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function getPaket(Request $request)
    {
        $paket = Paket::where('id_jenis', $request->id_jenis)->get();
        if ($paket == null) {
            return response()->json('failed get data', 404);
        }
        return response()->json($paket, 200);
    }
}
