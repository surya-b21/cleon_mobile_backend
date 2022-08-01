<?php

namespace App\Http\Controllers\Admin;

use App\Exports\TransaksiByBulanExport;
use App\Exports\TransaksiByPaketExport;
use App\Exports\TransaksiExport;
use App\Http\Controllers\Controller;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $month = DB::table('riwayat')->select(DB::raw('month(created_at) as bulan, month(created_at) as bulan_value'))->distinct()->get();

        $list = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );

        foreach ($month as $data) {
            $data->bulan = $list[$data->bulan];
        }

        $paket = DB::table('paket')->get();

        return view('admin.transaksi', compact(['month', 'paket']));
    }

    public function export()
    {
        return Excel::download(new TransaksiExport, 'List Transaksi.xlsx');
    }

    public function exportbybulan($bulan)
    {
        $month = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );

        return Excel::download(new TransaksiByBulanExport($bulan), 'List Transaksi Bulan ' . $month[$bulan] . '.xlsx');
    }

    public function exportbypaket($paket)
    {
        $get = DB::table('paket')->select('nama')->where('id', $paket)->first();

        return Excel::download(new TransaksiByPaketExport($paket), 'List Transaksi Paket ' . $get->nama . '.xlsx');
    }

    public function getTransaksi()
    {
        return DataTables::of(Riwayat::query()->select(['id_user', 'id_paket', 'username', 'password', 'created_at'])->orderByDesc('id'))
            ->editColumn('id_user', function ($data) {
                if ($data->id_user) {
                    $user = DB::table('users')->select(['name'])->where('id', $data->id_user)->first();
                    return $user->name;
                }
            })
            ->editColumn('id_paket', function ($data) {
                if ($data->id_user) {
                    $paket = DB::table('paket')->select(['nama'])->where('id', $data->id_paket)->first();
                    return $paket->nama;
                }
            })
            ->editColumn('created_at', function ($data) {
                $bulan = array(
                    1 => 'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                );
                $pisah = explode('-', date_format($data->created_at, "Y-m-d"));
                // dd($bulan[07]);
                return $pisah[2] . ' ' . $bulan[(int) $pisah[1]] . ' ' . $pisah[0];
            })
            ->rawColumns(['id_user', 'id_paket', 'created_at'])
            ->make(true);
    }
}
