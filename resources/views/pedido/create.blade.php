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
                            <select onchange="cargar_productos(this)" name="id_sede" class="form-control" id="sedes">
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
                            <input id="precio_total" readonly class="form-control" type="number" name="total" value="0">
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
                            <label for="producto">Nombre</label>
                            <select name="producto" class="form-control" id="producto" onchange="colocar_precio(this)">
                                <option value="">Seleccione...</option>
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="">Cantidad</label>
                            <input type="number" class="form-control" value="0" id="cantidad">
                        </div>
                        <div class="form-group col-3">
                            <label for="">Precio</label>
                            <input id="precio" type="number" class="form-control" readonly value="0">
                        </div>
                        <div class="col-12">
                            <button onclick="agregar_producto()" type="button" class="btn btn-success float-right">Agregar</button>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody id="tblProductos">
                        
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

            function colocar_precio(e){
                let precio = $("#producto option:selected").attr("precio");
                $("#precio").val(precio);
            }

            function cargar_productos(e){
                $("#producto").html('<option value="">Seleccione un producto</option>');
                let id = $(e).val();
                $.ajax({
                    url:'/traer_productos/'+id,
                    type:'get',
                    dataType:'json'
                }).done(respuesta=>{
                    respuesta.map(r => $("#producto").append(`<option precio="${r.valor_producto}" value="${r.id_producto}">${r.nombre_producto}</option>`));
                }).fail(q=>console.log(q))
            }
        
            function agregar_producto(){
                let producto_id = $("#producto option:selected").val();
                let producto_text = $("#producto option:selected").text();
                let cantidad = $("#cantidad").val();
                let precio = $("#precio").val();
                

                if(cantidad>0 && precio>0){
                    
                    $("#tblProductos").append(`
                        <tr>
                            <td>
                                <input type="hidden" name="producto[]" value="${producto}"/>
                                <input type="hidden" name="cantidad[]" value="${cantidad}"/>
                                ${producto_text }
                            </td>
                            <td>
                                ${cantidad }
                            </td>
                            <td>
                                ${precio }
                            </td>
                            <td>
                                ${parseInt(cantidad)*parseInt(precio) }
                            </td>
                            <td>
                                <button class="btn btn-danger">Quitar</button>
                            </td>
                        </tr>                    
                    `);
                    let precio_total = $("#precio_total").val() || 0;
                    $("#precio_total").val(parseInt(precio_total) + (parseInt(cantidad) * parseInt(precio)));
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Agregue los datos correctamente!',
                    })
                }
            }
        </script>
    @stop

@stop