<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

class AkunController extends Controller
{
    // public function index()
    // {
    //     // $user = DB::table('users');
    //     $user = Auth::user();
    //     return view('profil.profil', ['users' => $user]);
    // }

    // public function edit(Request $request)
    // {
    //     // $user = DB::table('users');
    //     return view('profil.edit', ['users' => $request->user()]);
    // }

    // public function update(Request $request)
    // {
    //     // $request->user()->update(
    //     //     $request->all()
    //     // );

    //     $user = Auth::user();
    //     $this->validate($request, [
    //         'name' => 'required|max:255|unique:users,name,' . $user->id,
    //         'email' => 'required|email|max:255|unique:users,email,' . $user->id,
    //     ]);
    //     $input = $request->only('name', 'email');
    //     $user->update($input);

    //     return redirect('profil');
    // }
    // public function hapus($id)
    // {
    //     // menghapus data user berdasarkan id yang dipilih
    //     $user = Auth::user();
    //     $user->delete();
    //     // alihkan halaman ke halaman homepage
    //     return redirect('register')->with('message', 'Akun Anda berhasil dihapus, silakan melakukan registrasi akun kembali!');
    // }

    // public function daftaruser(User $model)
    // {
    //     return view('admin.daftaruser');
    // }

    public function daftaruser()
    {
        $akun = DB::table('akun')->get();
        return view('admin.daftaruser', ['akun' => $akun]);
    }

    public function editUser(Request $request)
    {
        //$akun = User::get();
        return view('user.profile.edit', ['akun' => $request -> user()]);
    }

    public function editAdmin()
    {
        return view('profile.edit');
    }
    public function editDaftarUser($idakun)
    {
        //DB::table('akun')->
        $akun =  User::where('idakun',$idakun)->get();
        return view('admin.edituser', ['akun' => $akun]);
    }
    public function updateDaftarUser(Request $request)
    {
        User::where('idakun', $request->idakun)->update([
            'namaakun' => $request->namaakun,
            'email' => $request->email,
            'jenisakun'=>$request->jenisakun
        ]);
        return redirect ('/daftaruser');
    }

    public function update(ProfileRequest $request)
    {
        // if (auth()->user()->jenisakun == 0) {
        //     return back()->withErrors(['not_allow_profile' => __('You are not allowed to change data for a default user.')]);
        // }

        // auth()->user()->update($request->all());
        // $user = Auth::user();
        // $this->validate($request, [
        //     'namaakun' => 'required',
        //     'email' => 'required'
        // ]);
        // $input = $request->only('namaakun', 'email');
        // $user->update($input);

        $request->user()->update(
            $request->all()
        );


        return back()->withStatus(__('Profile successfully updated.'));
    }

    public function password(PasswordRequest $request)
    {
        if (auth()->user()->jenisakun == 0) {
            return back()->withErrors(['not_allow_password' => __('You are not allowed to change the password for a default user.')]);
        }

        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }


}
