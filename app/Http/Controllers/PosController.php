<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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

    public function tambahPos()
    {
        $pos = DB::table('pos')->get();
        return view('user.tambahpos', ['pos' => $pos]);
    }

    public function simpan(Request $request)
    {
        DB::table('pos')->insert([
            'idakun' => auth()->user()->idakun,
            'flagcounter' => '0',
            'statuspos' => '0',
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
            'created_at' => DB::raw('now()'),
            'updated_at' => DB::raw('now()'),
        ]);
        return redirect('home');
    }

    public function update(Request $request)
    {
        DB::table('pos')->where('idpos', $request->id)->update([
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
        ]);
        return redirect('user.dashboard');
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

    public function edit($id)
    {
        $pos = DB::table('pos')->where('idpos', $id)->get();
        return view('pos.edit', ['posts' => $pos]);
    }

    public function hapus($id)
    {
        DB::table('pos')->where('idpos', $id)->delete();
        return redirect('');
        //trigger autodelete pos yang sudah selesai >1minggu
    }
}
