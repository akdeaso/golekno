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
    // Route::resource('user', 'App\Http\Controllers\AkunController', ['except' => ['show']]);
    Route::get('profil/user/edit', ['as' => 'profilUser.edit', 'uses' => 'App\Http\Controllers\AkunController@editUser']);
    Route::patch('profil/user', ['as' => 'profilUser.update', 'uses' => 'App\Http\Controllers\AkunController@update']);
    Route::put('profil/user/password', ['as' => 'profilUser.password', 'uses' => 'App\Http\Controllers\AkunController@password']);
    Route::get('pos/tambah', ['as' => 'posUser.tambah', 'uses' => 'App\Http\Controllers\PosController@tambahPos']);
    Route::post('pos/simpan', ['as' => 'posUser.simpan', 'uses' => 'App\Http\Controllers\PosController@simpan']);
    Route::get('pos/edit/{idpos}', ['as' => 'posUser.edit', 'uses' => 'App\Http\Controllers\PosController@edit']);
    Route::post('pos/update', ['as' => 'posUser.update', 'uses' => 'App\Http\Controllers\PosController@update']);
    Route::get('pos/lihat/{idpos}', ['as' => 'posUser.lihat', 'uses' => 'App\Http\Controllers\HomeController@lihatposuser']);
    Route::get('pos/cari', ['as' => 'posUser.cari', 'uses' => 'App\Http\Controllers\PosController@cari']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('daftaruser', ['as' => 'daftaruser', 'uses' => 'App\Http\Controllers\AkunController@daftaruser']);
    Route::get('profil/admin', ['as' => 'profilAdmin.edit', 'uses' => 'App\Http\Controllers\AkunController@editAdmin']);
    Route::put('profil/admin', ['as' => 'profilAdmin.update', 'uses' => 'App\Http\Controllers\AkunController@update']);
    Route::put('profil/admin/password', ['as' => 'profilAdmin.password', 'uses' => 'App\Http\Controllers\AkunController@password']);
    Route::get('profil/admin/edituser/{idakun}', ['as' => 'profilAdmin.edituser', 'uses' => 'App\Http\Controllers\AkunController@editDaftarUser']);
    Route::post('profil/admin/updateuser', ['as' => 'profilAdmin.updateuser', 'uses' => 'App\Http\Controllers\AkunController@updateDaftarUser']);
    Route::get('admin/pos/cari', ['as' => 'posAdmin.cari', 'uses' => 'App\Http\Controllers\PosController@cariAdmin']);
});
