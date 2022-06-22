<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SantriController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\TahfidController;
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


//Route::get('/', [HomeController::class, 'home']);
//Route::get('/', LoginController::class);

Route::resource('/santri' , SantriController::class)->middleware('auth');
Route::resource('/kelas' , KelasController::class)->middleware('auth');
Route::resource('/presensi' , PresensiController::class)->middleware('auth');
Route::resource('/tahfid' , TahfidController::class)->middleware('auth');

Route::get('/detail/{param}','App\Http\Controllers\TahfidController@detail')->name('detail')->middleware('auth');

Route::get('/', 'App\Http\Controllers\LoginController@index');
Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login');
Route::post('/login/proses', 'App\Http\Controllers\LoginController@proses');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard')->middleware('auth');
//Route::post('/login/proses', 'App\Http\Controllers\LoginController@proses');
