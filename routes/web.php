<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CentralController;
use App\Http\Controllers\USedeController;
use App\Http\Controllers\EntradaProductoController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
@ -22,24 +21,22 @@ use App\Http\Controllers\USedeController;
|
*/

Route::get('/', function () {
    return view('auth/login');
});

/*Route::get('/empleado/create', function () {
    return view('empleado.create');
});
*/
Route::resource('users', UserController::class)->names('admin.users');
Route::resource('empleado', EmpleadoController::class);
Route::resource('sede', SedeController::class);
Route::resource('producto', ProductoController::class);
Route::resource('informe', InformeController::class);
Route::resource('pedido', PedidoController::class);

Route::resource('entradaproducto', EntradaProductoController::class);

/*Route::get('/', function () {
    return Inertia::render('login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});*/

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();