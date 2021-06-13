<?php

namespace App\Http\Controllers;

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
        return view('user.dashboard');
    }

    public function indexAdmin()
    {
        return view('admin.dashboard');
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
        return view('user.hilang');
    }

    public function ditemukanUser()
    {
        return view('user.ditemukan');
    }

    public function adminHome()
    {
        return view('admin.dashboard');
    }
}
