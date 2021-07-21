<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pos;

class PosController extends Controller
{
    //
    public function index()
    {
        $pos = DB::table('pos')->get();
        return view('', ['pos' => $pos]);
    }

    public function tambahPos()
    {
        $pos = Pos::get();
        return view('user.tambahpos', ['pos' => $pos]);
    }

    public function simpan(Request $request)
    {
        $this->validate($request, [
            'foto' => 'required|file|image|mimes:jpeg,png,jpg',
        ]);
        $foto = $request->file('foto');
        $nama_file = time() . "_" . $foto->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'image';
        $foto->move($tujuan_upload, $nama_file);
        Pos::create([
            'idakun' => auth()->user()->idakun,
            'flagcounter' => '0',
            'statuspos' => '0',
            'tipepos' => $request->tipepos,
            'foto' => $nama_file,
            'gender' => $request->gender,
            'umur' => $request->umur,
            'tinggibadan' => $request->tinggibadan,
            'deskripsi' => $request->deskripsi,
            'kontak' => $request->kontak,
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'created_at' => DB::raw('now()'),
            'updated_at' => DB::raw('now()'),
        ]);
        return redirect('home')->with('success','Pos berhasil dipublikasikan.');
    }

    public function edit($idpos)
    {
        $pos = DB::table('pos')->where('idpos', $idpos)->get();
        return view('user.editpos', ['pos' => $pos]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'foto' => 'required|file|image|mimes:jpeg,png,jpg',
        ]);
        $foto = $request->file('foto');
        $nama_file = time() . "_" . $foto->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'image';
        $foto->move($tujuan_upload, $nama_file);
        DB::table('pos')->where('idpos', $request->idpos)->update([
            'nama' => $request->nama,
            'gender' => $request->gender,
            'umur' => $request->umur,
            'tinggibadan' => $request->tinggibadan,
            'deskripsi' => $request->deskripsi,
            'kontak' => $request->kontak,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'foto' => $nama_file,
            'updated_at' => DB::raw('now()'),
        ]);
        return redirect('home')->with('success', 'Pos berhasil diperbaharui');
    }

    public function hapus(Request $request)
    {
        DB::table('pos')->where('idpos', $request->idpos)->update([
            'statuspos' => $request->statuspos,
            'updated_at' => DB::raw('now()'),
        ]);
        DB::table('pos')->where('idpos', $request->idpos)->delete();
        return redirect('home')->with('success', 'Pos Berhasil Dihapus!');
    }

    //cari user
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $pos = DB::table('pos')
            ->where('nama', 'like', "%" . $cari . "%")
            ->paginate();
        return view('user.dashboard', ['pos' => $pos]);
    }

    //cari admin
    public function cariAdmin(Request $request)
    {
        $cari = $request->cari;
        $pos = DB::table('pos')
            ->where('nama', 'like', "%" . $cari . "%")
            ->paginate();
        $arsippos = DB::table('arsippos')
            ->where('nama', 'like', "%" . $cari . "%")
            ->paginate();
        return view('admin.dashboard', ['pos' => $pos , 'arsippos' => $arsippos]);
    }

    public function filter(Request $request)
    {
        $pos=Pos::where('tanggal', '>=', $request->from)->where('tanggal', '<=', $request->to)
        ->paginate();
        return view('user.dashboard', compact('pos'));
    }

    public function buat()
    {
        return redirect('');
    }

    public function hapusadmin ($idpos)
    {
        DB::table('pos')->where('idpos', $idpos)->delete();
        return redirect('admin/home')->with('success', 'Pos Berhasil Dihapus dan Diarsipkan!');
    }

}
