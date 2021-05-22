<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AkunController extends Controller
{
    //
    public function index()
    {
        $user = DB::table('users');
        return view('profil', ['profil' => $user]);
    }
}
