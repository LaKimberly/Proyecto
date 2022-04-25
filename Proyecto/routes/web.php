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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/create', [App\Http\Controllers\AdministradorController::class, 'create']);
Route::post('/admin/store', [App\Http\Controllers\AdministradorController::class, 'store'])->name('admin.store');

//users

Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::post('/user', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('/user/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
Route::get('/user/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::delete('/user/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.delete');