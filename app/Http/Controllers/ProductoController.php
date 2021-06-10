<?php

namespace App\Http\Controllers;

use App\Models\Producto\Producto;
use Illuminate\Http\Request;
use App\Models\Sede\Sede;
use Auth;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
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
            $datos['productos'] = Producto::where("id_sede", "=", $mostrarSede)
            ->where("nombre_producto", "LIKE", '%'.$texto."%")
            ->paginate(6);
        }else{
            $texto = trim($request->get('texto'));
            $datos['productos'] = Producto::where("nombre_producto", "LIKE", '%'.$texto."%")
            ->paginate(6);
        }
        
        //dd($mostrarSede);
        return view('producto.index', $datos, compact('texto'));
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
