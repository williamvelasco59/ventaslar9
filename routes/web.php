<?php

use App\Http\Controllers\CategoriaController;
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
    return view('layouts/admin');
});

Route::resource('/categoria', CategoriaController::class);
// Route::resource('categoria', CategoriaController::class);
// Route::get('/almacen/{categoria}/edit', [CategoriaController::class, 'edit'])->name('almacen.edit');