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
Route::get('/Usuarios/{user}/{contra}/edit',[App\Http\Controllers\UsuariosController::class,'edit'])->name('Usuarios.edit');
Route::get('/productos',[App\Http\Controllers\ProductoController::class,'index'])->name('Producto.index');
Route::get('/productos/create',[App\Http\Controllers\ProductoController::class,'create'])->name('Producto.create');