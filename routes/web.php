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
Route::get('/profil', 'App\Http\Controllers\AkunController@index');

//editprofil
Route::group(['middleware' => 'auth'], function () {
    Route::get('/editprofil', 'App\Http\Controllers\AkunController@edit')->name('editprofil');
});

Route::patch('editprofil', 'AkunController@update')
        ->name('updateprofil');

