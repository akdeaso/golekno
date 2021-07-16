<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\laporhilang;
use App\Models\User;

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
        $pos = DB::table('pos')->orderBy('updated_at', 'desc')->paginate(12);
        return view('user.dashboard', ['pos' => $pos]);
    }

    public function indexAdmin()
    {
        $pos = DB::table('pos')->orderBy('updated_at', 'desc')->paginate(10);
        return view('admin.dashboard', ['pos' => $pos]);
    }

    //view hilang admin
    public function hilang()
    {
        $pos = DB::table('pos')->where('tipepos', '=', 1)->orderBy('updated_at', 'desc')->paginate(12);
        return view('admin.hilang', ['pos' => $pos]);
    }

    public function ditemukan()
    {
        $pos = DB::table('pos')->where('tipepos', '=', 0)->orderBy('updated_at', 'desc')->paginate(12);
        return view('admin.ditemukan', ['pos' => $pos]);
    }

    //view hilang user
    public function hilangUser()
    {
        $pos = DB::table('pos')->where('tipepos', '=', 1)->orderBy('updated_at', 'desc')->paginate(12);
        return view('user.hilang', ['pos' => $pos]);
    }

    public function ditemukanUser()
    {
        $pos = DB::table('pos')->where('tipepos', '=', 0)->orderBy('updated_at', 'desc')->paginate(12);
        return view('user.ditemukan', ['pos' => $pos]);
    }

    public function adminHome()
    {
        return view('admin.dashboard');
    }

    public function lihatposuser($idpos)
    {
        $pos = DB::table('pos')
        ->join('akun', 'pos.idakun', '=', 'akun.idakun')
        ->select('pos.*', 'akun.namaakun')
        ->where('idpos',$idpos)
        ->get();
        $laporhilang = laporhilang::select("*")
        ->join('akun','akun.idakun','=','laporhilang.idakun')
        ->where("idpos", "=" ,$idpos)
        ->get();
        return view('user.lihatpos', ['pos' => $pos , 'laporhilang' => $laporhilang]);
    }





    public function lihatposadmin($idpos)
    {
        $pos = DB::table('pos')
        ->join('akun', 'pos.idakun', '=', 'akun.idakun')
        ->select('pos.*', 'akun.namaakun')
        ->where('idpos',$idpos)
        ->get();
        $laporhilang = laporhilang::select("*")
        ->join('akun','akun.idakun','=','laporhilang.idakun')
        ->where("idpos", "=" ,$idpos)
        ->get();
        return view('admin.lihatpos', ['pos' => $pos , 'laporhilang' => $laporhilang , ]);
    }
}
