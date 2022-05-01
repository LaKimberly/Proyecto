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
//Normal
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/persons/create', [App\Http\Controllers\PersonController::class, 'create']);
Route::get('/admin/create', [App\Http\Controllers\AdministradorController::class, 'create']);
Route::post('/admin/store', [App\Http\Controllers\AdministradorController::class, 'store'])->name('admin.register');

// Producto
// crear
Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [App\Http\Controllers\ProductController::class, 'store'])->name('product.register');

// ver
Route::get('/product/index', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');

//editar
Route::get('/product/{product}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');

// show
Route::get('/product/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

// Actualizar
Route::put('/product/{product}', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');


// Eliminar
Route::delete('/product/{product}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.delete');

// menu
Route::get('/menu', [App\Http\Controllers\ProductController::class, 'menu'])->name('product.menu');

// carrito
Route::get('/carrito', [App\Http\Controllers\ProductController::class, 'carrito'])->name('product.carrito');

