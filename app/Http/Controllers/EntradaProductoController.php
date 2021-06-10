<?php

namespace App\Http\Controllers;

use App\Models\EntradaProducto\EntradaProducto;
use App\Models\Sede\Sede;
use App\Models\Producto\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers;
use Auth;

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
        $mostrarSede = 0;
        if( Auth::user()->codigo == 04){
            $mostrarSede = 2;
        }elseif( Auth::user()->codigo == 03){
            $mostrarSede = 3;
        }elseif( Auth::user()->codigo == 05){
            $mostrarSede = 1;
        }
        if($mostrarSede != 0){
        $texto = trim($request->get('texto'));
        $datos = EntradaProducto::join('productos', 'entrada_productos.id_producto', '=', 'productos.id_producto')
        ->join('sedes', 'productos.id_sede', '=', 'sedes.id_sede')
        ->where("productos.nombre_producto", "LIKE", '%'.$texto."%")
        ->where("productos.id_sede", "=", $mostrarSede)
        ->paginate(6);
        }else{
            $texto = trim($request->get('texto'));
            $datos = EntradaProducto::join('productos', 'entrada_productos.id_producto', '=', 'productos.id_producto')
            ->join('sedes', 'productos.id_sede', '=', 'sedes.id_sede')
            ->where("productos.nombre_producto", "LIKE", '%'.$texto."%")
            ->paginate(6);
        }
        return view('entradaproducto.index',compact('datos', 'texto'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mostrarSede = 0;
        if( Auth::user()->codigo == 04){
            $mostrarSede = 2;
        }elseif( Auth::user()->codigo == 03){
            $mostrarSede = 3;
        }elseif( Auth::user()->codigo == 05){
            $mostrarSede = 1;
        }
        $sede = Sede::where("id_sede", "=", $mostrarSede)->get();
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
        Producto::where('id_sede', '=', $request->get('id_sede'))->where('id_producto', '=', $request->get('id_producto'))->increment('existencias', $request->get('cantidad_entrada'));
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
