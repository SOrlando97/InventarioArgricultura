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

Auth::routes();

Route::view('/', 'inicio')->name('/');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Usuario',[App\Http\Controllers\ModificarUsuario::class, 'index'])->name('modusuario');
Route::post('/Usuario',[App\Http\Controllers\ModificarUsuario::class, 'store'])->name('change.password');
Route::delete('/Usuario/{user}',[App\Http\Controllers\ModificarUsuario::class, 'destroy'])->name('change.delete');
Route::get('/Usuarios',[App\Http\Controllers\UsuariosController::class,'index'])->name('Usuarios.index');