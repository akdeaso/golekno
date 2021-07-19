<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArsipPosController extends Controller
{
    public function hapus($id)
    {
        DB::table('arsippos')->where('idarsip', $id)->delete();
        return redirect('');
    }
}
