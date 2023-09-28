<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MusicaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome');


Route::view('/register', 'auth.register')->name('register');

Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [UsuarioController::class, 'store']);
Route::post('/logout', [UsuarioController::class, 'destroy'])->name('logout');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::resource('musica', MusicaController::class);
Route::view('/allmusic', 'musica.all')->name('allmusic');
Route::get('/allmusic', [MusicaController::class, 'allmusic'])->name('allmusic');

Route::resource('usuario', UsuarioController::class);
