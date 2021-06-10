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
use App\Models\Producto\Producto;
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
Route::resource('users', UserController::class)->middleware('can:admin.users.index')->names('admin.users');
Route::resource('empleado', EmpleadoController::class)->middleware('can:admin.users.index');
Route::resource('sede', SedeController::class)->middleware('can:sede.index');
Route::resource('producto', ProductoController::class)->middleware('can:producto.index');
Route::resource('informe', InformeController::class);
Route::resource('pedido', PedidoController::class)->middleware('can:pedido.index');
Route::resource('entradaproducto', EntradaProductoController::class)->middleware('can:entradaproducto.index');
Route::get('traer_productos/{id}', function ($id) {
    $produc = Producto::where('id_sede','=', $id)->get();
    return response()->json($produc);
});
Route::get('traer_cantidad/{id}', function ($id) {
    $prod = Producto::find($id);
    return response()->json($prod);
});
Route::post('pedidos/nuevo_estado', [PedidoController::class, 'actualizarEstado']);
Route::post('nuevo_estado', [PedidoController::class, 'actualizarEstado']);
Route::get('pedidos/inconvenientes', [PedidoController::class, 'listarInconvenientes']);
Route::get('pedidos/cancelado', [PedidoController::class, 'listarCancelado']);
Route::get('pedidos/confirmado', [PedidoController::class, 'listarConfirmado']);
Route::get('pedidos/entregado', [PedidoController::class, 'listarEntregado']);
Route::get('pedidos/enviado', [PedidoController::class, 'listarEnviado']);
Route::get('pedidos/espera', [PedidoController::class, 'listarEspera']);
Route::get('entradaproducto/buscador','EntradaProductoController@buscador');
//Route::get('pedido', [PedidoController::class, 'index']);
//Route::get('pedido/create', [PedidoController::class, 'create']);
Auth::routes();

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