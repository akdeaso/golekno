<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        $post = DB::table('posts')->get();
        return view('homepage', ['posts' => $post]);
    }

    public function buat()
    {
        return view('pos/buat');
    }

    public function simpan(Request $request)
    {
        DB::table('posts')->insert([
            'Nama' => $request->Nama,
            'JenisPost' => $request->JenisPost,
            'Tanggal' => $request->Tanggal,
            'Tempat' => $request->Tempat,
            'Gender' => $request->Gender,
            'Umur' => $request->Umur,
            'Tinggi' => $request->Tinggi,
            'Berat' => $request->Berat,
            'Foto' => $request->Foto,
            'FotoTambahan' => $request->FotoTambahan,
        ]);
        return redirect('homepage');
    }

    public function edit($id)
    {
        $posts = DB::table('posts')->where('id', $id)->get();
        return view('pos.edit', ['posts' => $posts]);

    }

    public function update(Request $request)
    {
        DB::table('posts')->where('id',$request->id)->update([
            'Nama' => $request->Nama,
            'JenisPost' => $request->JenisPost,
            'Tanggal' => $request->Tanggal,
            'Tempat' => $request->Tempat,
            'Gender' => $request->Gender,
            'Umur' => $request->Umur,
            'Tinggi' => $request->Tinggi,
            'Berat' => $request->Berat,
            'Foto' => $request->Foto,
            'FotoTambahan' => $request->FotoTambahan,

        ]);
        return redirect('homepage');
    }

    public function delete($id)
    {
        DB::table('posts')->where('id', $id)->delete();
        return redirect('homepage');
    }
}
