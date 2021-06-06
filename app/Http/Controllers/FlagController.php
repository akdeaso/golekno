<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FlagController extends Controller
{
    public function tambah()
    {
        //ambil idpos, idakun insert alasan
    }

    public function hapus($id)
    {
        DB::table('flagpos')->where('idflag', $id)->delete();
        return redirect('');
    }
}
