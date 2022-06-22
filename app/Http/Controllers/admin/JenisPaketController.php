<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisPaket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JenisPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validate = $request->validate([
            'nama' => 'required'
        ]);

        if (!$validate) {
            return redirect()->route('paket.index')->with('gagal', 'Gagal Menambahkan Jenis Paket');
        }

        $input = $request->all();
        JenisPaket::create($input);

        return redirect()->route('paket.index')->with('sukses', 'Sukses Menambahkan Jenis Paket');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisPaket  $jenisPaket
     * @return \Illuminate\Http\Response
     */
    public function show(JenisPaket $jenisPaket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisPaket  $jenisPaket
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisPaket $jenisPaket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisPaket  $jenisPaket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required'
        ]);

        if (!$validate) {
            return redirect()->route('paket.index')->with('gagal', 'Gagal Mengupdate Jenis Paket');
        }

        $jenisPaket = JenisPaket::findOrFail($id);
        $jenisPaket->nama = $request->nama;
        $jenisPaket->updated_at = Carbon::now();
        $jenisPaket->save();


        return redirect()->route('paket.index')->with('sukses', 'Sukses Mengupdate Jenis Paket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisPaket  $jenisPaket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenisPaket = JenisPaket::findOrFail($id);
        $jenisPaket->delete();

        return redirect()->route('paket.index')->with('sukses', 'Sukses Menghapus Jenis Paket');
    }

    public function getjenispaket()
    {
        return DataTables::of(JenisPaket::query())
            ->addColumn('aksi', function ($data) {
                return '<button class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded-full shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" data-url="' . route("paket.jenis-paket.update", $data->id) . '" data-id="' . $data->id . '" id="editJenisPaket" onclick="toggleModal(' . "'modal-jenis-paket'" . ')" type="button">
                <i class="fas fa-user-edit"></i></button> <button class="bg-red-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded-full shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" data-url="' . route("paket.jenis-paket.destroy", $data->id) . '" id="hapusJenisPaket" type="button">
                <i class="fas fa-trash"></i></button>';
            })
            ->addIndexColumn()
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function getUpdate()
    {
        $jp = JenisPaket::findOrFail($_POST['id']);
        echo json_encode($jp);
    }
}
