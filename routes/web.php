<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\File;
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
    return view('layouts/admin');
});

Route::resource('categoria', CategoriaController::class);
Route::resource('articulo', ArticuloController::class);



Route::get('generarpdf', [CategoriaController::class, 'imprimir']);

Route::get('generarpdfart', [ArticuloController::class, 'imprimir']);

Route::get('graficosbarras', [CategoriaController::class, 'graficosbarras']);
Route::get('graficostortas', [CategoriaController::class, 'graficostortas']);

// articulos
Route::get('graficobarraarti', [ArticuloController::class, 'graficosbarras']);
Route::get('graficotortarti', [ArticuloController::class, 'graficotorta']);