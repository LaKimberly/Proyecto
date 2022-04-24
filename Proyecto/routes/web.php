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
Route::get('/persons/create', [App\Http\Controllers\PersonController::class, 'create']);
Route::get('/admin/create', [App\Http\Controllers\AdministradorController::class, 'create']);
Route::post('/admin/store', [App\Http\Controllers\AdministradorController::class, 'store'])->name('admin.register');
