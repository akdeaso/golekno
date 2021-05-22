<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfilRequest;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AkunController extends Controller
{
    //
    public function index()
    {
        $user = DB::table('users');
        return view('profil', ['users' => $user]);
    }

    public function edit(Request $request)
    {
        $user = DB::table('users');
        return view('editprofil', ['users' =>$request -> user()]);
    }

    public function update(UpdateProfilRequest $request)
    {
        $request->user()->update(
            $request->all()
        );

        return redirect()->route('editprofil');
    }

}


