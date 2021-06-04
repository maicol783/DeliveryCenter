<?php

namespace App\Http\Controllers;

use App\Models\Producto\Producto;
use Illuminate\Http\Request;
use App\Models\Sede\Sede;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const PAGINACION = 10;
    public function index(Request $request)
    {
        //$datos['productos'] = Producto::paginate(7);
        $buscarporproducto = $request->get('buscarporproducto');
        $datos['productos'] = Producto::where('nombre_producto','like','%'.$buscarporproducto.'%')->orWhere('valor_producto','like','%'.$buscarporproducto.'%')->paginate($this::PAGINACION);
        return view('producto.index', $datos, compact('buscarporproducto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sede = Sede::all();
        return view('producto.create', compact('sede'));
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
        $datosProducto = request()->except('_token','Enviar');
        Producto::insert($datosProducto);
        //return response()->json($datosProducto);
        return redirect('producto')->with('mensaje','ProductoCrear');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        $producto = Producto::findOrFail($producto);
        $sede = Sede::all();
        return view('producto.edit', compact('producto','sede'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_producto)
    {
        $datosProducto = request()->except('_token','Enviar','_method');
        Producto::where('id_producto','=',$id_producto)->update($datosProducto);

        
        return redirect('producto')->with('mensaje','ProductoModificar');
    }

    public function traer_sede(){
        //$sedes = Producto::where('id_sede', '=', $id_sede)->get ();
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_producto)
    {
        Producto::destroy($id_producto);
        return redirect('producto')->with('mensaje','ProductoEliminar');
    }
}
