<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido\Pedido;
use App\Models\Sede\Sede;
use App\Models\Producto\Producto;
use App\Models\Estado\Estado;
use App\Models\DetallePedido\DetallePedido;
use DB;
use Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datos = Pedido::all();
        $id = $request -> input("id");
        $estados = Estado::all();
        $productos = [];
        if($id != null){
            $productos = Producto::select("productos.*","detalle_pedidos.cantidad as cantidad_c")
            ->join("detalle_pedidos", "productos.id_producto", "=", "detalle_pedidos.id_producto")
            ->where("detalle_pedidos.id_pedido", $id)
            ->get();
        }
        return view('pedido.index' ,compact("productos", "datos", "estados"));
    }

    public function listarInconvenientes(Request $request)
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
        $datos = Pedido::where("id_estado", "=", "3")
        ->where("id_sede", "=", $mostrarSede)
        ->get();
        }else{
            $datos = Pedido::where("id_estado", "=", "3")      
            ->get();
        }
        $id = $request -> input("id");
        $estados = Estado::all();
        $productos = [];
        if($id != null){
            $productos = Producto::select("productos.*","detalle_pedidos.cantidad as cantidad_c")
            ->join("detalle_pedidos", "productos.id_producto", "=", "detalle_pedidos.id_producto")
            ->where("detalle_pedidos.id_pedido", $id)
            ->get();
        }
        return view('pedido.inconvenientes' ,compact("productos", "datos", "estados"));
    }

    public function listarEspera(Request $request)
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
            $datos = Pedido::where("id_estado", "=", "1")
            ->where("id_sede", "=", $mostrarSede)
            ->get();
        }else{
            $datos = Pedido::where("id_estado", "=", "1")
            ->get();
        }
        $id = $request -> input("id");
        $estados = Estado::all();
        $productos = [];
        if($id != null){
            $productos = Producto::select("productos.*","detalle_pedidos.cantidad as cantidad_c")
            ->join("detalle_pedidos", "productos.id_producto", "=", "detalle_pedidos.id_producto")
            ->where("detalle_pedidos.id_pedido", $id)
            ->get();
        }
        return view('pedido.espera' ,compact("productos", "datos", "estados"));
    }

    public function listarCancelado(Request $request)
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
        $datos = Pedido::where("id_estado", "=", "6")
        ->where("id_sede", "=", $mostrarSede)
        ->get();
        }else{
            $datos = Pedido::where("id_estado", "=", "6")
            ->get();
        }
        $id = $request -> input("id");
        $estados = Estado::all();
        $productos = [];
        if($id != null){
            $productos = Producto::select("productos.*","detalle_pedidos.cantidad as cantidad_c")
            ->join("detalle_pedidos", "productos.id_producto", "=", "detalle_pedidos.id_producto")
            ->where("detalle_pedidos.id_pedido", $id)
            ->get();
        }
        return view('pedido.cancelado' ,compact("productos", "datos", "estados"));
    }

    public function listarConfirmado(Request $request)
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
            $datos = Pedido::where("id_estado", "=", "2")
            ->where("id_sede", "=", $mostrarSede)
            ->get();
        }else{
            $datos = Pedido::where("id_estado", "=", "2")
        ->get();
        }
        $id = $request -> input("id");
        $estados = Estado::all();
        $productos = [];
        if($id != null){
            $productos = Producto::select("productos.*","detalle_pedidos.cantidad as cantidad_c")
            ->join("detalle_pedidos", "productos.id_producto", "=", "detalle_pedidos.id_producto")
            ->where("detalle_pedidos.id_pedido", $id)
            ->get();
        }
        return view('pedido.confirmado' ,compact("productos", "datos", "estados"));
    }

    public function listarEnviado(Request $request)
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
            $datos = Pedido::where("id_estado", "=", "4")
            ->where("id_sede", "=", $mostrarSede)
            ->get();
        }else{
            $datos = Pedido::where("id_estado", "=", "4")
            ->get();
        }
        $id = $request -> input("id");
        $estados = Estado::all();
        $productos = [];
        if($id != null){
            $productos = Producto::select("productos.*","detalle_pedidos.cantidad as cantidad_c")
            ->join("detalle_pedidos", "productos.id_producto", "=", "detalle_pedidos.id_producto")
            ->where("detalle_pedidos.id_pedido", $id)
            ->get();
        }
        return view('pedido.enviado' ,compact("productos", "datos", "estados"));
    }

    public function listarEntregado(Request $request)
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
            $datos = Pedido::where("id_estado", "=", "5")
            ->where("id_sede", "=", $mostrarSede)
            ->get();
        }else{
            $datos = Pedido::where("id_estado", "=", "5")
            ->get();
        }
        $id = $request -> input("id");
        $estados = Estado::all();
        $productos = [];
        if($id != null){
            $productos = Producto::select("productos.*","detalle_pedidos.cantidad as cantidad_c")
            ->join("detalle_pedidos", "productos.id_producto", "=", "detalle_pedidos.id_producto")
            ->where("detalle_pedidos.id_pedido", $id)
            ->get();
        }
        return view('pedido.entregado' ,compact("productos", "datos", "estados"));
    }

    public function actualizarEstado(Request $request){

        $datos = $request->all();
        $pedido = Pedido::find($request->input("id_estado"));
        $estado = $request->input('nuevo_estado');
        $pedido->update(["id_estado" => $estado]);
        $producto = [];
        
        if($estado == "6"){
            $producto = Producto::select("productos.*","detalle_pedidos.cantidad as cantidad_c")
            ->join("detalle_pedidos", "productos.id_producto", "=", "detalle_pedidos.id_producto")
            ->where("detalle_pedidos.id_pedido", $request->input("id_estado"))
            ->get();

            foreach($producto as $value){
                $producto = Producto::find($value->id_producto);
                $producto ->update(["existencias" => $producto->existencias + $value->cantidad_c]);
            }
        }

        //dd($estado);
        if($estado == "1"){
            return redirect("pedidos/espera");
        }elseif($estado == "2"){
            return redirect("pedidos/confirmado");
        }elseif($estado == "3"){
            return redirect("pedidos/inconvenientes");
        }elseif($estado == "4"){
            return redirect("pedidos/enviado");
        }elseif($estado == "5"){
            return redirect("pedidos/entregado");
        }elseif($estado == "6"){
            return redirect("pedidos/cancelado");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sedes = Sede::all();
        $estados = Estado::all();
        $productos = Producto::all();
        return view('pedido.create', compact('sedes','estados','productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosPedido = $request->all();
        $carbon = new \Carbon\Carbon();
        $actualFecha = $carbon->format('Y-m-d');

            try{
                DB::beginTransaction();
                $pedido = Pedido::create([
                    "fecha"=>$actualFecha,
                    "id_sede"=>$datosPedido["id_sede"],
                    "id_estado"=>$datosPedido["id_estado"],
                    "documento_cliente"=>$datosPedido["documento_cliente"],
                    "nombre_cliente"=>$datosPedido["nombre_cliente"],
                    "apellido_cliente"=>$datosPedido["apellido_cliente"],
                    "direccion_cliente"=>$datosPedido["direccion_cliente"],
                    "telefono_cliente"=>$datosPedido["telefono_cliente"],
                    "total"=>$this->calcular_precio($datosPedido["producto"],$datosPedido["cantidad"])
        
                    ]);

                foreach($datosPedido["producto"] as $key => $valor){
                        DetallePedido::create([
                            "id_producto"=>$valor,
                            "id_pedido"=>$pedido->id_pedido,
                            "cantidad"=>$datosPedido["cantidad"][$key]
                        ]);
                        $prod = Producto::find($valor);
                        $prod->update(["existencias"=>$prod->existencias - $datosPedido["cantidad"][$key]]);

                }

                DB::commit();
                return redirect("pedidos/espera")->with('mensaje','PedidoCrear');
                }catch(\Exception $e){
                    DB::rollback();
                    return redirect("pedido/create")->with('mensaje','PedidoNoCrear');
                }
                       
    }

    public function calcular_precio($productos, $cantidades)
    {
        $precio = 0;
        foreach($productos as $key=> $valor){
            $producto = Producto::find($valor);
            $precio += ($producto->valor_producto * $cantidades[$key]);
        }
        return $precio;
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
