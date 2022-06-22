<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Riwayat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RiwayatController extends Controller
{
    public function getRiwayat()
    {
        $user = Auth::user()->id;
        $riwayat = DB::table('riwayat')->select(['riwayat.*', 'paket.nama', 'paket.keterangan'])->join('paket', 'riwayat.id_paket', 'paket.id')->where('riwayat.id_user', $user)->orderByDesc('riwayat.created_at')->get();

        return response()->json($riwayat, 200);
    }

    public function createRiwayat(Request $req)
    {
        $idUser = Auth::user()->id;

        $validated = Validator::make($req->all(), [
            "id_paket" => "required"
        ]);

        if ($validated->fails()) {
            return response()->json(["message" => "invalid request"], 400);
        }

        $username = uniqid();
        $password = uniqid();

        DB::table('userinfo')->insert([
            "username" => $username,
            "changeuserinfo" => 0,
            "creationdate" => Carbon::now(),
            "creationby" => "administrator"
        ]);

        DB::table('radcheck')->insert([
            "username" => $username,
            "attribute" => "Cleartext-Password",
            "op" => ":=",
            "value" => "$password"
        ]);

        $riwayat = new Riwayat;
        $riwayat->id_user = $idUser;
        $riwayat->id_paket = $req->id_paket;
        $riwayat->username =  $username;
        $riwayat->password = $password;

        $riwayat->save();

        return response()->json(["username" => $riwayat->username, "password" => $riwayat->password], 201);
    }
}
