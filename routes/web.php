<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Routes;
use App\User;

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
    return view('homepage');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//profile


//editprofil
Route::group(['middleware' => 'auth'], function () {
    Route::get('profil', 'App\Http\Controllers\AkunController@index');
    Route::get('profil/edit/{id}', 'App\Http\Controllers\AkunController@edit');
    Route::patch('profil/update', 'App\Http\Controllers\AkunController@update')->name('profil.update');
    //hapusakun
    Route::get('profil/hapus/{id}','App\Http\Controllers\AkunController@hapus');


});


Route::get('pos/buat','App\Http\Controllers\PostController@buat');
Route::post('pos/simpan', 'App\Http\Controllers\PostController@simpan') ->name('pos.simpan');
Route::get('pos','App\Http\Controllers\PostController@index');
