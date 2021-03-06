<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido\Pedido;
use App\Models\Sede\Sede;
use App\Models\Producto\Producto;
use App\Models\Estado\Estado;
use App\Models\DetallePedido\DetallePedido;
use DB;
use PDF;

class InformeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        $acu = 0;
        $texto = trim($request->get('texto'));
        $texto2 = trim($request->get('texto2'));
        $datos = Pedido::where("id_estado", "=", "5")
        ->whereBetween('fecha', [$texto, $texto2])
        ->get();
        $id = $request -> input("id");
        $estados = Estado::all();
        $productos = [];
        if($id != null){
            $productos = Producto::select("productos.*","detalle_pedidos.cantidad as cantidad_c")
            ->join("detalle_pedidos", "productos.id_producto", "=", "detalle_pedidos.id_producto")
            ->where("detalle_pedidos.id_pedido", $id)
            ->get();
        }
        return view('informe.index' ,compact("productos", "datos", "estados", 'acu', 'texto2', 'texto'));
    }

    public function informesPDF(Request $request)
    {  
        $acu = 0;
        $datos = Pedido::where("id_estado", "=", "5")->get();
        return view('informe.informesPDF' ,compact("datos", "acu"));
    }

    public function descargarPDF(Request $request)
    {
        $datos = Pedido::where("id_estado", "=", "5")->get();

        return PDF::loadView('informe.informesPDF', compact("datos"))
        ->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
