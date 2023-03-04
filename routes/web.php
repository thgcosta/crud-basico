<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
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

Route::get('/users', [UsersController::class, 'index'])->middleware('auth')->name('users.home');
Route::get('/users/new', [UsersController::class, 'new'])->middleware('auth');
Route::post('users/add', [UsersController::class, 'add'])->name('users.add')->middleware('auth');
Route::get('users/update/{id}', [UsersController::class, 'update'])->name('users.update')->middleware('auth');
Route::post('users/save/{id}', [UsersController::class, 'save'])->name('users.save')->middleware('auth');
Route::delete('users/delete/{id}', [UsersController::class, 'delete'])->name('users.delete')->middleware('auth');