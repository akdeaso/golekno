<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\laporhilang;

class LaporHilangController extends Controller
{

    public function tambahlapor()
    {
        $laporhilang = laporhilang::get();
        return view('user.lihatpos', ['laporpos' => $laporhilang]);
    }

    public function simpanlapor(Request $request)
    {
        //ambil idpos, idakun insert kontak, tempatpenemuan, deskripsipenemuan
        laporhilang::create([
            'idpos' => $request->idpos,
            'idakun' => auth()->user()->idakun,
            'kontak' => $request->kontak,
            'tempatpenemuan' => $request->tempatpenemuan,
            'deskripsipenemuan' => $request->deskripsipenemuan,
        ]);
        return back()->with('success', 'Laporan terbaru berhasil ditambahkan');
    }

    public function hapuslaporhilang($id)
    {
        DB::table('laporhilang')->where('idlapor', $id)->delete();
        return redirect('');
    }
}
