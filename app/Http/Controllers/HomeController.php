<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('homepage');
    }

    // public function upload(Request $request)
    // {
    //     if ($request->hasFile('image')) {
    //         $filename = $request->image->getClientOriginalName();
    //         $request->image->storeAs('images', $filename, 'public');
    //         Auth()->user()->update(['image' => $filename]);
    //     }
    //     return redirect()->back();
    // }
}
