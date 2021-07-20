<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\flagpos;

class FlagPosController extends Controller
{
    public function tambahflag()
    {
        $flagpos = flagpos::get();
        return view('user.lihatpos', ['flagpos' => $flagpos]);
    }

    public function simpanflag(Request $request)
    {
        //ambil idpos, idakun insert kontak, tempatpenemuan, deskripsipenemuan
        flagpos::create([
            'idpos' => $request->idpos,
            'idakun' => auth()->user()->idakun,
            'alasan' => $request->alasan,
        ]);
        return back()->with('success', 'Pos berhasil dilaporkan!');
    }

    public function hapusflag($idflag)
    {
        DB::table('flagpos')->where('idflag', $idflag)->delete();

        return back()->with('success','Laporan Flag Telah Dihapus');
    }

}
