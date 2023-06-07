<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('Pengguna.login');
})->name('login');

Route::post('/postlogin', 'App\Http\Controllers\LoginController@postlogin')->name('postlogin');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth','ceklevel:admin']], function (){
    route::get('/halaman-satu', 'App\Http\Controllers\BerandaController@halamansatu')->name('halaman-satu');
});

Route::group(['middleware' => ['auth','ceklevel:admin,user']], function (){
    route::get('/beranda', 'App\Http\Controllers\BerandaController@index')->name('beranda');
    route::get('/halaman-dua', 'App\Http\Controllers\PegawaiController@index')->name('halaman-dua');
    route::get('/exportpegawai', 'App\Http\Controllers\PegawaiController@pegawaiexport')->name('exportpegawai');
    route::post('/importpegawai', 'App\Http\Controllers\PegawaiController@pegawaiimportexcel')->name('importpegawai');
});