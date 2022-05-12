<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenispaket = DB::table('jenis_paket')->select(['id', 'nama'])->get();
        return view('admin.paket', compact(['jenispaket']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'nama' => 'required',
            'harga' => 'required',
            'speed' => 'required',
            'kuota' => 'required',
            'id_jenis' => 'required',
            'keterangan' => 'required'
        ]);

        if ($validated->fails()) {
            return redirect()->route('paket.index')->with('gagal', 'Gagal Menambahkan Paket');
        }

        Paket::create($request->all());

        return redirect()->route('paket.index')->with('sukses', 'Sukses Menambahkan Paket');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function show(Paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit(Paket $paket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = Validator::make($request->all(), [
            'nama' => 'required',
            'harga' => 'required',
            'speed' => 'required',
            'kuota' => 'required',
            'id_jenis' => 'required',
            'keterangan' => 'required'
        ]);

        if ($validated->fails()) {
            return redirect()->route('paket.index')->with('gagal', 'Gagal Mengupdate Paket');
        }

        $paket = Paket::findOrFail($id);
        $paket->nama = $request->nama;
        $paket->harga = $request->harga;
        $paket->speed = $request->speed;
        $paket->kuota = $request->kuota;
        $paket->id_jenis = $request->id_jenis;
        $paket->keterangan = $request->keterangan;
        $paket->updated_at = Carbon::now();
        $paket->save();

        return redirect()->route('paket.index')->with('sukses', 'Sukses Mengupdate Paket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paket = Paket::findOrFail($id);
        $paket->delete();

        return redirect()->route('paket.index')->with('sukses', 'Sukses Menghapus Paket');
    }

    public function getpaket()
    {
        return DataTables::of(Paket::query())
            ->addColumn('aksi', function ($data) {
                return '<button class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded-full shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" data-url="' . route("paket.update", $data->id) . '" data-id="' . $data->id . '" id="editPaket" onclick="toggleModal(' . "'modal-paket'" . ')" type="button">
                <i class="fas fa-user-edit"></i></button> <button class="bg-red-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded-full shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" data-url="' . route("paket.destroy", $data->id) . '" id="hapusPaket" type="button">
                <i class="fas fa-trash"></i></button>';
            })
            ->editColumn('id_jenis', function ($data) {
                $jenispaket = DB::table('jenis_paket')->select(['nama'])->where('id', $data->id_jenis)->first();
                return $jenispaket->nama;
            })
            ->rawColumns(['aksi', 'id_jenis'])
            ->make(true);
    }

    public function getupdate()
    {
        $paket = Paket::findOrFail($_POST['id']);
        echo json_encode($paket);
    }
}
