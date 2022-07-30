<?php

use Illuminate\Support\Facades\Auth;
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
//Rutas de modificar usuario autenticado
Route::get('/Usuario', [App\Http\Controllers\ModificarUsuario::class, 'index'])->name('modusuario');
Route::post('/Usuario', [App\Http\Controllers\ModificarUsuario::class, 'store'])->name('change.password');
Route::put('/Usuario/edit', [App\Http\Controllers\ModificarUsuario::class, 'storeUT'])->name('change.user');
Route::delete('/Usuario/{user}', [App\Http\Controllers\ModificarUsuario::class, 'destroy'])->name('change.delete');
Route::get('/Usuario/{user}/productos', [App\Http\Controllers\ModificarUsuario::class, 'show'])->name('usuario.show');
//Rutas Modifcar usuario como Admin
Route::get('/Usuarios', [App\Http\Controllers\UsuariosController::class, 'index'])->name('Usuarios.index');
Route::get('/Usuarios/{user}/{contra}/edit', [App\Http\Controllers\UsuariosController::class, 'edit'])->name('Usuarios.edit');
// Rutas para productos
Route::get('/productos', [App\Http\Controllers\ProductoController::class, 'index'])->name('Producto.index');
Route::get('/productos/create', [App\Http\Controllers\ProductoController::class, 'create'])->name('Producto.create');
Route::post('/productos', [App\Http\Controllers\ProductoController::class, 'store'])->name('Producto.store');
Route::delete('/productos/{producto}', [App\Http\Controllers\ProductoController::class, 'destroy'])->name('Producto.delete');
Route::get('/productos/{producto}', [App\Http\Controllers\ProductoController::class, 'show'])->name('Producto.show');
Route::get('/productos/{producto}/edit', [App\Http\Controllers\ProductoController::class, 'edit'])->name('Producto.edit');
Route::put('/productos/{producto}', [App\Http\Controllers\ProductoController::class, 'update'])->name('Producto.update');
//Rutas para tipo de producto
Route::get('/Tipo_producto', [App\Http\Controllers\TipoproductoController::class, 'index'])->name('Tipo_producto.index');
Route::post('/Tipo_producto/{descripcion}', [App\Http\Controllers\TipoproductoController::class, 'store'])->name('Tipo_producto.store');
Route::delete('/Tipo_producto/{tipoproducto}', [App\Http\Controllers\TipoproductoController::class, 'destroy'])->name('Tipo_producto.delete');
Route::put('/Tipo_producto/{tipoproducto}/{nombre}/', [App\Http\Controllers\TipoproductoController::class, 'update'])->name('Tipo_producto.update');
//Rutas para historial de entrada
Route::get('/productos/{producto}/entrada', [App\Http\Controllers\HistorialentradaController::class, 'index'])->name('historialentrada.index');
Route::post('/productos/entrada/{producto}', [App\Http\Controllers\HistorialentradaController::class, 'store'])->name('historialentrada.store');
Route::get('/productos/pdfentrada/{producto}', [App\Http\Controllers\HistorialentradaController::class, 'PDF'])->name('historialentrada.PDF');
//Rutas para historial de salida
Route::get('/productos/{producto}/salida', [App\Http\Controllers\HistorialsalidaController::class, 'index'])->name('historialsalida.index');
Route::post('/productos/salida/{producto}', [App\Http\Controllers\HistorialsalidaController::class, 'store'])->name('historialsalida.store');
Route::get('/productos/pdfsalida/{producto}', [App\Http\Controllers\HistorialsalidaController::class, 'PDF'])->name('historialsalida.PDF');
//Ruta para Lector de QR
Route::get('/QR', [App\Http\Controllers\QRController::class, 'index'])->name('QR.index');
Route::post('/QR', [App\Http\Controllers\QRController::class, 'LeerQR'])->name('QR.leerQR');