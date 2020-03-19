<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function __construct()
    {
        $this->middleware(
            function ($request, $next) {
                if (Gate::allows('manage-users')) return $next($request);
                abort(403, 'Anda tidak memiliki cukup hak akses');
            }
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $peserta = \App\Peserta::paginate(10);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword) {
            $peserta = \App\Peserta::where('nomor_id', 'LIKE', "%$filterKeyword%")->paginate(10);
        }
        return view('peserta.index', ['peserta' => $peserta]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("peserta.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            "nama" => "required|min:5|max:100",
            "nomor_id" => "required|min:5|max:20|unique:peserta",
            "jenis_kelamin" => "required",
            "kategori" => "required",
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required",
            "nomor_hp" => "required|digits_between:10,12",
            "alamat" => "required"
        ])->validate();

        $new_peserta = new \App\Peserta;
        $new_peserta->nama = $request->get('nama');
        $new_peserta->nomor_id = $request->get('nomor_id');
        $new_peserta->jenis_kelamin = $request->get('jenis_kelamin');
        $new_peserta->kategori = $request->get('kategori');
        $new_peserta->tanggal_lahir = $request->get('tanggal_lahir');
        $new_peserta->tempat_lahir = $request->get('tempat_lahir');
        $new_peserta->alamat = $request->get('alamat');
        $new_peserta->nomor_hp = $request->get('nomor_hp');

        if ($request->file('foto')) {
            $file = $request->file('foto')->store('foto', 'public');
            $new_peserta->foto = $file;
        }

        $new_peserta->save();
        return redirect()->route('peserta.create')->with('status', 'Peserta Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peserta = \App\Peserta::findOrFail($id);
        return view('peserta.show', ['peserta' => $peserta]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peserta = \App\Peserta::findOrFail($id);
        return view('peserta.edit', ['peserta' => $peserta]);
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
        \Validator::make($request->all(), [
            "nama" => "required|min:5|max:100",
            "jenis_kelamin" => "required",
            "kategori" => "required",
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required",
            "nomor_hp" => "required|digits_between:10,12",
            "alamat" => "required"
        ])->validate();

        $peserta = \App\Peserta::findOrFail($id);
        $peserta->nama = $request->get('nama');

        $peserta->kategori = $request->get('kategori');
        $peserta->jenis_kelamin = $request->get('jenis_kelamin');
        $peserta->tempat_lahir = $request->get('tempat_lahir');
        $peserta->tanggal_lahir = $request->get('tanggal_lahir');
        $peserta->alamat = $request->get('alamat');
        $peserta->nomor_hp = $request->get('nomor_hp');

        if ($request->file('foto')) {
            if ($peserta->foto && file_exists(storage_path('app/public/' . $peserta->foto))) {
                \Storage::delete('public/' . $peserta->foto);
                $file = $request->file('foto')->store('foto', 'public');
                $peserta->foto = $file;
            }
        }
        $peserta->save();
        return redirect()->route('peserta.index', [$id])->with('status', 'Peserta berhasil disunting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peserta = \App\Peserta::findOrFail($id);
        $peserta->delete();
        return redirect()->route('peserta.index')->with('status', 'User successfully delete');
    }
}
