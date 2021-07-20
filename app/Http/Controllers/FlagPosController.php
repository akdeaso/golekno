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

    public function hapusflag(Request $request)
    {
        DB::table('pos')->where('idpos', $request->idpos)->update([
            'flagcounter' => 0,
        ]);
        DB::table('flagpos')->where('idpos', $request->idpos)->delete();
        return back()->with('success','Laporan Flag Telah Dihapus');
    }

}
