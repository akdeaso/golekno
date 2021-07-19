<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\bookmarkpos;
use Illuminate\Http\Request;

class BookmarkPosController extends Controller
{
    public function tambahbookmark($idpos)
    {
        $bookmark = bookmarkpos::where('idpos',$idpos)->get();
        return view('user.lihatpos', ['bookmark' => $bookmark]);
        //ambil id akun, ambil id pos (bingung implementasi mengambil 2 id)
    }
    public function simpanbookmark(Request $request)
    {
        bookmarkpos::create([
            'idpos' => $request->idpos,
            'idakun' => auth()->user()->idakun,
        ]);
        return back()->withStatus(__('Informasi Tebaru Berhasil  Dilaporkan'));
        //ambil id akun, ambil id pos (bingung implementasi mengambil 2 id)
    }
    public function hapusbookmark($idbookmark)
    {
	DB::table('bookmarkpos')->where('idbookmark',$idbookmark)->delete();

	return back()->withStatus(__('Bookmark Telah Dihapus'));
        //ambil id akun, ambil id pos (bingung implementasi mengambil 2 id)
    }
}
