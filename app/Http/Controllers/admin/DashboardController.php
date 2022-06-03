<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Riwayat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        $total_user = DB::table('users')->get()->count();
        $total_transaksi = DB::table('riwayat')->get()->count();
        return view('admin.dashboard', compact(['total_user', 'total_transaksi']));
    }

    public function get10Transaksi()
    {
        return DataTables::of(Riwayat::query()->select(['id_user', 'id_paket', 'created_at'])->orderByDesc('id')->limit(10))
            ->editColumn('id_user', function ($data) {
                if ($data->id_user) {
                    $user = DB::table('users')->select(['name'])->where('id', $data->id_user)->first();
                    return $user->name;
                }
            })
            ->editColumn('id_paket', function ($data) {
                if ($data->id_user) {
                    $paket = DB::table('paket')->select(['nama'])->where('id', $data->id_user)->first();
                    return $paket->nama;
                }
            })
            ->rawColumns(['id_user', 'id_paket'])
            ->make(true);
    }

    public function get10User()
    {
        return DataTables::of(User::query()->select(['name', 'email'])->orderByDesc('id')->limit(10))->make(true);
    }
}
