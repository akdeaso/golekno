<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\bookmarkpos;
use Illuminate\Http\Request;

class BookmarkPosController extends Controller
{
    protected $cid;
    public function bookmark($idpos){

        $this->cid = auth()->user()->idakun;
        if (!bookmarkpos::where(['idpos'=>$idpos,'idakun'=>$this->cid])->exists()){
            bookmarkpos::create(['idpos'=>$idpos,'idakun'=>$this->cid]);
            return redirect()->back()->with('success', 'Bookmark berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Bookmark sudah ditambahkan');
        }


    }
    public function hapusbookmark($idbookmark)
    {
	DB::table('bookmarkpos')->where('idbookmark',$idbookmark)->delete();

	return back()->with('success','Bookmark Telah Dihapus');
        //ambil id akun, ambil id pos (bingung implementasi mengambil 2 id)
    }

}
