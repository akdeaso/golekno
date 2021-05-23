<?php

namespace App\Http\Controllers;

// use App\Http\Requests\UpdateProfilRequest;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AkunController extends Controller
{
    //
    public function index()
    {
        // $user = DB::table('users');
        $user = Auth::user();
        return view('profil.profil', ['users' => $user]);
    }

    public function edit(Request $request)
    {
        // $user = DB::table('users');
        return view('profil.edit', ['users' => $request->user()]);
    }

    public function update(Request $request)
    {
        // $request->user()->update(
        //     $request->all()
        // );

        $user = Auth::user();
        $this->validate($request, [
            'name' => 'required|max:255|unique:users,name,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);
        $input = $request->only('name', 'email');
        $user->update($input);

        return redirect('profil');
    }
}
