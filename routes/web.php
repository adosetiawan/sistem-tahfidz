<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SantriController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/greeting', function () {
//     return 'Hello Mamat';
// });

// // Route::get('/Kuser', function () {
// //     return 'Ini User';
// // });

// Route::get('/user', function () {
//     return view('user');
// });


Route::get('/', [HomeController::class, 'home']);

//Route::resource('santri', SantriController::class);
//Route::get('santri', SantriController::class);
//Route::get('santri', 'App\Http\Controllers\SantriController@index');
Route::resource('/santri' , SantriController::class);

// Route::resource('user', StudentController::class);

// Route::get('mahasiswa', StudentController::class);


// Route::resource('user' ,UserController::class);