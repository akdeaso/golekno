<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporHilangController extends Controller
{
    public function tambah()
    {
        //ambil idpos, idakun insert kontak, tempatpenemuan, deskripsipenemuan
    }

    public function hapus($id)
    {
        DB::table('laporhilang')->where('idlapor', $id)->delete();
        return redirect('');
    }
}
