<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pengguna');
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            return redirect()->route('pengguna.index')->with('gagal', 'Gagal Menambahkan User');
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['email_verified_at'] = Carbon::now();
        $user = User::create($input);


        return redirect()->route('pengguna.index')->with('sukses', 'Berhasil Menambahkan User');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            return redirect()->route('pengguna.index')->with('gagal', 'Gagal Mengupdate User');
        }

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt('$request->password');
        $user->updated_at = Carbon::now();
        $user->save();

        return redirect()->route('pengguna.index')->with('sukses', 'Berhasil Mengupdate User');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('pengguna.index')->with('sukses', 'Berhasil Menghapus User');
    }

    public function getUser()
    {
        return DataTables::of(User::query()->select(['id', 'name', 'email', 'email_verified_at'])->orderByDesc('id'))
            ->addColumn('aksi', function ($data) {
                return '<button class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded-full shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" data-url="' . route("pengguna.update", $data->id) . '" data-id="' . $data->id . '" id="editUser" onclick="toggleModal(' . "'modal-id'" . ')" type="button">
                <i class="fas fa-user-edit"></i></button> <button class="bg-red-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded-full shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" data-url="' . route("pengguna.destroy", $data->id) . '" id="hapusUser" type="button">
                <i class="fas fa-trash"></i></button>';
            })
            ->editColumn('email_verified_at', function ($data) {
                if ($data->email_verified_at) {
                    return '<span class="bg-emerald-500 text-white font-bold uppercase text-sm px-6 py-3 rounded-full shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                    <i class="fas fa-check"></i></span>';
                } else {
                    return '<span class="bg-red-500 text-white font-bold uppercase text-sm px-6 py-3 rounded-full shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                    <i class="fas fa-times"></i></span>';
                }
            })
            ->rawColumns(['aksi', 'email_verified_at'])
            ->make(true);
    }

    public function getUpdate()
    {
        $user = User::findOrFail($_POST['id']);
        echo json_encode($user);
    }
}
