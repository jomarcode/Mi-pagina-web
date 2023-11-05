<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use App\Models\Oferta;
use App\Models\Producto;
use App\Models\proveedor;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    $proveedores = proveedor::all();
    $productos = Producto::all();
    $ofertas = Oferta::all();
    return view('welcome')->with('proveedores', $proveedores)->with('productos', $productos)->with('ofertas', $ofertas);
});

Route::get('producto/{slug}', [StoreController::class, 'show'])
    ->name('product-details');

// Ruta para mostrar todas las categorías y productos
Route::get('/producto', [StoreController::class, 'index'])
    ->name('producto.index');

// Ruta para mostrar la página de contacto
Route::get('/contact', function () {
    return view('contact');
});

// Ruta para buscar productos por categoría por su slug
Route::get('categorias/{slug}', [StoreController::class, 'searchCategory'])
    ->name('searchCategory');

    Route::get('/nosotros', [ClientesController::class, 'clientes']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', UserController::class);
Route::resource('proveedors', ProveedorController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('ofertas', OfertaController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('productos', ProductoController::class);
