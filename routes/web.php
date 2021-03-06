<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'indexAdmin'])->name('admin.home')->middleware('jenisakun');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('admin/hilang', 'App\Http\Controllers\HomeController@hilang')->name('hilang');
Route::get('/hilang', 'App\Http\Controllers\HomeController@hilangUser')->name('hilangUser');
Route::get('admin/ditemukan', 'App\Http\Controllers\HomeController@ditemukan')->name('ditemukan');
Route::get('/ditemukan', 'App\Http\Controllers\HomeController@ditemukanUser')->name('ditemukanUser');

Route::group(['middleware' => 'auth'], function () {
    Route::get('profil/user/edit', ['as' => 'profilUser.edit', 'uses' => 'App\Http\Controllers\AkunController@editUser']);
    Route::put('profil/user', ['as' => 'profilUser.update', 'uses' => 'App\Http\Controllers\AkunController@update']);
    Route::put('profil/user/password', ['as' => 'profilUser.password', 'uses' => 'App\Http\Controllers\AkunController@password']);
    Route::get('pos/tambah', ['as' => 'posUser.tambah', 'uses' => 'App\Http\Controllers\PosController@tambahPos']);
    Route::post('pos/simpan', ['as' => 'posUser.simpan', 'uses' => 'App\Http\Controllers\PosController@simpan']);
    Route::get('pos/edit/{idpos}', ['as' => 'posUser.edit', 'uses' => 'App\Http\Controllers\PosController@edit']);
    Route::post('pos/update', ['as' => 'posUser.update', 'uses' => 'App\Http\Controllers\PosController@update']);
    Route::get('pos/lihat/{idpos}', ['as' => 'posUser.lihat', 'uses' => 'App\Http\Controllers\HomeController@lihatposuser']);
    Route::get('pos/cari', ['as' => 'posUser.cari', 'uses' => 'App\Http\Controllers\PosController@cari']);
    Route::get('/pos/laporhilangtambah', ['as' => 'laporhilang.tambah', 'uses' => 'App\Http\Controllers\LaporHilangController@tambahlapor']);
    Route::post('/pos/laporhilangsimpan', ['as' => 'laporhilang.simpan', 'uses' => 'App\Http\Controllers\LaporHilangController@simpanlapor']);
    Route::get('/pos/bookmark/{idpos}', ['as' => 'bookmark', 'uses' => 'App\Http\Controllers\BookmarkPosController@bookmark']);
    Route::get('/pos/daftarbookmark', ['as' => 'bookmark.daftar', 'uses' => 'App\Http\Controllers\HomeController@bookmarkuser']);
    Route::get('/pos/hapusbookmark/{idbookmark}', ['as' => 'bookmark.hapus', 'uses' => 'App\Http\Controllers\BookmarkPosController@hapusbookmark']);
    Route::post('pos/hapus', ['as' => 'posUser.hapus', 'uses' => 'App\Http\Controllers\PosController@hapus']);
    Route::get('/pos/flagtambah', ['as' => 'flag.tambah', 'uses' => 'App\Http\Controllers\FlagPosController@tambahflag']);
    Route::post('/pos/flagsimpan', ['as' => 'flag.simpan', 'uses' => 'App\Http\Controllers\FlagPosController@simpanflag']);
    Route::post('/pos/filter', ['as' => 'posUser.filter', 'uses' => 'App\Http\Controllers\PosController@filter']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('daftaruser', ['as' => 'daftaruser', 'uses' => 'App\Http\Controllers\AkunController@daftaruser']);
    Route::get('profil/admin', ['as' => 'profilAdmin.edit', 'uses' => 'App\Http\Controllers\AkunController@editAdmin']);
    Route::put('profil/admin', ['as' => 'profilAdmin.update', 'uses' => 'App\Http\Controllers\AkunController@update']);
    Route::put('profil/admin/password', ['as' => 'profilAdmin.password', 'uses' => 'App\Http\Controllers\AkunController@password']);
    Route::get('profil/admin/edituser/{idakun}', ['as' => 'profilAdmin.edituser', 'uses' => 'App\Http\Controllers\AkunController@editDaftarUser']);
    Route::post('profil/admin/updateuser', ['as' => 'profilAdmin.updateuser', 'uses' => 'App\Http\Controllers\AkunController@updateDaftarUser']);
    Route::get('admin/pos/cari', ['as' => 'posAdmin.cari', 'uses' => 'App\Http\Controllers\PosController@cariAdmin']);
    Route::get('daftaruser/tambah', ['as' => 'tambahuser', 'uses' => 'App\Http\Controllers\AkunController@tambahuser']);
    Route::post('daftaruser/simpan', ['as' => 'tambahuser.simpan', 'uses' => 'App\Http\Controllers\AkunController@simpan']);
    Route::get('admin/pos/lihat/{idpos}', ['as' => 'posAdmin.lihat', 'uses' => 'App\Http\Controllers\HomeController@lihatposadmin']);
    Route::get('admin/pos/lihatlaporan/{idpos}', ['as' => 'posAdmin.lihatlaporan', 'uses' => 'App\Http\Controllers\HomeController@lihatlaporan']);
    Route::get('admin/pos/hapusflag/{idpos}', ['as' => 'posAdmin.hapusflag', 'uses' => 'App\Http\Controllers\FlagPosController@hapusflag']);
    Route::get('admin/pos/hapus/{idpos}', ['as' => 'posAdmin.hapus', 'uses' => 'App\Http\Controllers\PosController@hapusadmin']);
});
