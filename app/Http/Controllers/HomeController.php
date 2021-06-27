<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pos = DB::table('pos')->get();
        return view('user.dashboard', ['pos' => $pos]);
    }

    public function indexAdmin()
    {
        $pos = DB::table('pos')->get();
        return view('admin.dashboard', ['pos' => $pos]);
    }

    //view hilang admin
    public function hilang()
    {
        return view('admin.hilang');
    }

    public function ditemukan()
    {
        return view('admin.ditemukan');
    }

    //view hilang user
    public function hilangUser()
    {
        $pos = DB::table('pos')->where('tipepos', '=', 1)->get();
        return view('user.hilang', ['pos' => $pos]);
    }

    public function ditemukanUser()
    {
        $pos = DB::table('pos')->where('tipepos', '=', 0)->get();
        return view('user.ditemukan', ['pos' => $pos]);
    }

    public function adminHome()
    {
        return view('admin.dashboard');
    }
}
