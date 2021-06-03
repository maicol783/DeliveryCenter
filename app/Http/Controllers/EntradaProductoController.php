<?php

namespace App\Http\Controllers;

use App\Models\EntradaProducto\EntradaProducto;
use App\Models\Sede\Sede;
use App\Models\Producto\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers;

class EntradaProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const PAGINACION = 10;
    public function index(Request $request)
    {
        $buscarporentrada = $request->get('buscarporentrada');
        $datos['entradas'] = EntradaProducto::join('productos', 'entrada_productos.id_producto', '=', 'productos.id_producto')
        ->join('sedes', 'productos.id_sede', '=', 'sedes.id_sede')
        ->get();
        return view('entradaproducto.index', $datos,compact('buscarporentrada'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sede = Sede::all();
        $producto = Producto::all();
        return view('entradaproducto.create', compact('sede','producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosEmpleado = request()->all();
        $datosEntrada = request()->except('_token','Enviar','id_sede');
        EntradaProducto::insert($datosEntrada);
        Producto::where('id_sede', '=', $request->get('id_sede'))->increment('existencias', $request->get('cantidad_entrada'));
        //return response()->json($datosEntrada);
        return redirect('entradaproducto')->with('mensaje','EntradaCrear');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EntradaProducto\EntradaProducto  $entradaProducto
     * @return \Illuminate\Http\Response
     */
    public function show(EntradaProducto $entradaProducto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EntradaProducto\EntradaProducto  $entradaProducto
     * @return \Illuminate\Http\Response
     */
    public function edit(EntradaProducto $entradaProducto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EntradaProducto\EntradaProducto  $entradaProducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EntradaProducto $entradaProducto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EntradaProducto\EntradaProducto  $entradaProducto
     * @return \Illuminate\Http\Response
     */
    public function destroy(EntradaProducto $entradaProducto)
    {
        //
    }
}
