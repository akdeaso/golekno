<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PosController extends Controller
{
    //
    public function index()
    {
        $pos = DB::table('pos')->get();
        return view('', ['pos' => $pos]);
    }

    public function cari()
    {
    }

    public function filter()
    {
    }

    public function buat()
    {
        return redirect('');
    }

    public function edit(Request $request)
    {
    }

    public function hapus($id)
    {
    }

    public function simpan(Request $request)
    {
        DB::table('pos')->insert([
            'tipepos' => $request->tipepos,
            'foto' => $request->foto,
            'gender' => $request->gender,
            'umur' => $request->umur,
            'tinggibadan' => $request->tinggibadan,
            'deskripsi' => $request->deskripsi,
            'kontak' => $request->kontak,
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'statuspos' => $request->statuspos,
            'tanggalselesai' => $request->tanggalselesai
        ]);
        return redirect('/');
    }
}
