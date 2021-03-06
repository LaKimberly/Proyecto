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

 // Route::get('/', function () {
//     return view('welcome');
// });
//Normal
Auth::routes();

Route::get('storage-link', function(){
    Artisan::call('storage:link');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/menu', [App\Http\Controllers\CartController::class, 'shop'])->name('product.menu');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/menu', [App\Http\Controllers\CartController::class, 'shop'])->name('product.menu');
    Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
    Route::post('/user', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    Route::get('/user/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
    Route::get('/user/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.delete');

    Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::post('/profileUpdatePassword', [App\Http\Controllers\ProfileController::class, 'update_password'])->name('profile.update_password');

    Route::resource('permissions', App\Http\Controllers\PermissionController::class );
    Route::resource('roles', App\Http\Controllers\RoleController::class );
    Route::resource('purcharses', App\Http\Controllers\PurcharseController::class );

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

    // carrito
    //Route::get('/shop', [App\Http\Controllers\CartController::class, 'shop'])->name('cart.shop');
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'cart'])->name('cart.index');
    Route::post('/add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.store');
    Route::post('/update', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
    Route::post('/remove', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
    Route::post('/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('cart.clear');

    Route::get('/purcharse/create', [App\Http\Controllers\PurcharseController::class, 'create'])->name('purcharses.create');
    Route::post('/purcharse', [App\Http\Controllers\PurcharseController::class, 'store'])->name('purcharses.store');
    Route::get('/purcharse', [App\Http\Controllers\PurcharseController::class, 'index'])->name('purcharses.index');
    Route::get('/purcharse/{purcharse}', [App\Http\Controllers\PurcharseController::class, 'show'])->name('purcharses.show');
    Route::get('/purcharse/{purcharse}/edit', [App\Http\Controllers\PurcharseController::class, 'edit'])->name('purcharses.edit');
    Route::put('/purcharse/{purcharse}', [App\Http\Controllers\PurcharseController::class, 'update'])->name('purcharses.update');
    Route::delete('/purcharse/{purcharse}', [App\Http\Controllers\PurcharseController::class, 'destroy'])->name('purcharses.delete');

});
