<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RiwayatController extends Controller
{
    public function getRiwayat()
    {
        $user = Auth::user()->id;
        $riwayat = DB::table('riwayat')->select(['riwayat.*', 'paket.nama', 'paket.keterangan'])->join('paket', 'riwayat.id_paket', 'paket.id')->where('riwayat.id_user', $user)->orderByDesc('riwayat.created_at')->get();

        return response()->json($riwayat, 200);
    }

    public function createRiwayat()
    {
        # code...
    }
}
