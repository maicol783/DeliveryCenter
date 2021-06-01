<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\DetalleProductoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CentralController;
use App\Http\Controllers\USedeController;

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
    return view('auth/login');
});

/*Route::get('/empleado/create', function () {
    return view('empleado.create');
});
*/

Route::resource('empleado', EmpleadoController::class);

Route::resource('ADMIN/sede', SedeController::class);
Route::resource('producto', ProductoController::class);
Route::resource('informe', InformeController::class);
Route::resource('pedido', PedidoController::class);
Route::resource('detalle_producto', DetalleProductoController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Central', [App\Http\Controllers\CentralController::class, 'index'])->name('Central');
Route::get('/Sede', [App\Http\Controllers\USedeController::class, 'index'])->name('Sede');
