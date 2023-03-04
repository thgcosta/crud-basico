<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/usuarios', [UsuariosController::class, 'index'])->middleware('auth')->name('usuarios.home');
Route::get('/usuarios/new', [UsuariosController::class, 'new'])->middleware('auth');
Route::post('usuario/add', [UsuariosController::class, 'add'])->name('usuarios.add')->middleware('auth');
Route::get('usuarios/update/{id}', [UsuariosController::class, 'update'])->name('usuarios.update')->middleware('auth');
Route::post('usuarios/save/{id}', [UsuariosController::class, 'save'])->name('usuarios.save')->middleware('auth');
Route::delete('usuarios/delete/{id}', [UsuariosController::class, 'delete'])->name('usuarios.delete')->middleware('auth');