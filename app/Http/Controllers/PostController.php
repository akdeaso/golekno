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
        $post = DB::table('posts');
        return view('pos/buat', ['posts' => $post]);
    }

    // public function buat()
    // {
    //     return redirect('pos/buat');
    // }

    public function simpan(Request $request)
    {
        DB::table ('posts') ->insert([
            'Nama' => $request->Nama,
            'JenisPost' => $request->JenisPost,
            'Tanggal' => $request->Tanggal,
            'Tempat' => $request ->Tempat,
            'Gender' => $request ->Gender,
            'Umur' => $request ->Umur,
            'Tinggi' => $request ->Tinggi,
            'Berat' => $request ->Berat,
            'Foto' => $request ->Foto,
            'FotoTambahan' => $request ->FotoTambahan,
        ]);
        return redirect('/');
    }



}


