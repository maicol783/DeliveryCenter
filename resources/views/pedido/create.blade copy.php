@extends('adminlte::page')
@section('title', 'Pedido')
@section('content_header')
    <h1 class="text-center">Pedido</h1>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
    .select2-selection {
        height: calc(2.25rem + 2px) !important;
    }
    </style>
@stop
@section('plugins.Sweetalert2', true)
@section('content')
    <form action="#" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-head">
                    <h4 class="text-center">Información de pedido</h4>
                    </div>
                    <div class="row card-body">
                        <div class="form-group col-6">
                            <label for="">Fecha</label>
                            <input id="" class="form-control" type="date" name="fecha">
                        </div>
                        <div class="form-group col-6">
                            <label for="">Sede</label>
                            <select onchange="cargar_productos(this)" name="id_sede" class="form-control" id="sedes" onchange="tomar_sede(this)">
                                <option value="">Seleccione...</option>
                                @foreach($sedes as $sede)
                                    <option value="{{ $sede->id_sede }}">{{ $sede->nombre_sede }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Estado de pedido</label>
                            <select name="id_estado" class="form-control">
                            <option value="">Seleccione...</option>
                                @foreach($estados as $estado)
                                    <option value="{{ $estado->id_estado }}">{{ $estado->nombre_estado }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Documento</label>
                            <input id="" class="form-control" type="text" name="documento_cliente">
                        </div>
                        <div class="form-group col-6">
                            <label for="">Nombre</label>
                            <input id="" class="form-control" type="text" name="nombre_cliente">
                        </div>
                        <div class="form-group col-6">
                            <label for="">Apellido</label>
                            <input id="" class="form-control" type="text" name="apellido_cliente">
                        </div>
                        <div class="form-group col-6">
                            <label for="">Dirección</label>
                            <input id="" class="form-control" type="text" name="direccion_cliente">
                        </div>
                        <div class="form-group col-6">
                            <label for="">Telefono</label>
                            <input id="" class="form-control" type="text" name="telefono_cliente">
                        </div>
                        <div class="form-group col-6">
                            <label for="">Total</label>
                            <input id="" readonly class="form-control" type="number" name="total" value="0">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-head">
                    <h4 class="text-center">Agregar productos</h4>
                    </div>
                    <div class="row card-body">
                        <div class="form-group col-6">
                            <label for="">Nombre</label>
                            <select name="" class="form-control" id="productos" onchange="colocar_precio(this)">
                            <option value="">Seleccione...</option>
                                @foreach($productos as $producto)
                                    <option precio="{{ $producto->valor_producto }}" value="{{ $producto->id_producto }}">{{ $producto->nombre_producto }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="">Cantidad</label>
                            <input type="number" class="form-control" value="0">
                        </div>
                        <div class="form-group col-3">
                            <label for="">Precio</label>
                            <input id="precio" type="number" class="form-control" readonly value="0">
                        </div>
                        <div class="col-12">
                            <button type="button" class="btn btn-success float-right">Agregar</button>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Prcio</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        </tbody>
                    </table>
                </div>
            </div>      
        </div>
    </form>
    @section('js')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function(){
                $("select").select2();
            })
        </script>
        <script>
            function colocar_precio(e){
                let precio = $("#productos option:selected").attr("precio");
                $("#precio").val(precio);
            }
            function tomar_sede(e){
                let id_sede = $("#sedes option:selected").attr("value");
            }
        </script>
    @stop

@stop