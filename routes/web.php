<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\EntradaProductoController;
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

Route::resource('empleado', EmpleadoController::class);
Route::resource('sede', SedeController::class);
Route::resource('producto', ProductoController::class);
Route::resource('informe', InformeController::class);
Route::resource('pedido', PedidoController::class);
Route::resource('entradaproducto', EntradaProductoController::class);
