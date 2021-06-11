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
    <form action="/pedido" class="formulario_crear" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-head">
                    <h4 style="margin: 20px 1px 1px 1px;" class="text-center">Información de pedido</h4>
                    </div>
                    <div class="row card-body">
                        <div class="form-group col-6">
                            <label for="">Sede</label>
                            <select onchange="cargar_productos(this)" name="id_sede" class="form-control" id="sedes">
                                <option value="">Seleccione...</option>
                                @foreach($sedes as $sede)
                                @if($sede->estatus == 1)
                                    <option value="{{ $sede->id_sede }}">{{ $sede->nombre_sede }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <input id="" class="form-control" type="hidden" value="1" name="id_estado">
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
                            <input id="precio_total" readonly class="form-control" type="number" name="total" >
                        </div>
                    </div>
                    <div class="col-12">
                        <button style="margin: 0px 0px 10px 1px;" type="submit" class="btn btn-success btm-block">Guardar</button>
                        <a class="btn btn-success float-right" href="{{ url('/pedido/') }}">Atras</a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-head">
                    <h4 style="margin: 20px 1px 1px 1px;" class="text-center">Agregar productos</h4>
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
                            <input type="number" class="form-control" id="cantidad">
                        </div>
                        <div class="form-group col-3">
                            <label for="">Precio</label>
                            <input id="precio" type="number" class="form-control" readonly>
                        </div>
                        <div class="col-12">
                            <button onclick="agregar_producto(), limpiar()" type="button" class="btn btn-success float-right">Agregar</button>
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
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>

            
            $(document).ready(function(){
                $("select.form-control").select2();
            });

            function colocar_precio(e){
                let precio = $("#producto option:selected").attr("precio");
                $("#precio").val(precio);
                let id = $(e).val();
                $.ajax({
                    url:'/traer_cantidad/'+id,
                    type:'get',
                    dataType:'json'
                }).done(respuesta=>{
                    cantidades = respuesta.existencias;
                    console.log(cantidades);
                }).fail(q=>console.log(q))
            }

            function cargar_productos(e){
                $("#producto").html('<option value="">Seleccione un producto</option>');
                let id = $(e).val();
                $.ajax({
                    url:'/traer_productos/'+id,
                    type:'get',
                    dataType:'json'
                }).done(respuesta=>{
                    respuesta.map(r => $("#producto").append(`<option exist="${r.existencias}" precio="${r.valor_producto}" value="${r.id_producto}">${r.nombre_producto}</option>`));
                }).fail(q=>console.log(q))
            }

        
            function agregar_producto(){
                let producto_id = $("#producto option:selected").val();
                let producto_text = $("#producto option:selected").text();
                let cantidad = $("#cantidad").val();
                let precio = $("#precio").val();
                
                
                if($("#tr-"+producto_id).length){
                    Swal.fire({
                            type: 'error',
                            title: 'Error',
                            text: 'El producto ya existe!',
                        });                   
                }else{
            
                    if(cantidad>0 && precio>0) {
                        if(cantidad<=cantidades){
                            $("#tblProductos").append(`
                                <tr id="tr-${producto_id}">
                                    <td>
                                        <input type="hidden" name="producto[]" value="${producto_id}"/>
                                        <input type="hidden" name="cantidad[]" value="${cantidad}"/>
                                        ${producto_text }
                                    </td>
                                    <td style ="width:114px;" >
                                        ${cantidad}
                                    <td>
                                        ${precio}
                                    </td>
                                    <td>
                                        ${parseInt(precio)*parseInt(cantidad)}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" onclick="eliminar_producto(${producto_id}, ${parseInt(precio)*parseInt(cantidad)})">Quitar</button>
                                    </td>
                                </tr>                    
                            `);
                            let precio_total = $("#precio_total").val() || 0;
                            $("#precio_total").val(parseInt(precio_total) + parseInt(precio)*parseInt(cantidad));
                            console.log(precio_total)
                        }else{
                            Swal.fire(
                                'Error!',
                                'No hay existencias suficientes, revise de nuevo.',
                                'warning'
                            );
                        }
                    }else{
                        Swal.fire({
                            type: 'error',
                            title: 'Error',
                            text: 'Debe llenar todos los campos!',
                        });
                    }
                }
            }

            function eliminar_producto(id,subtotal){
                $("#tr-"+id).remove();
                let precio_total = $("#precio_total").val() || 0;
                $("#precio_total").val(parseInt(precio_total) - subtotal);
            }

            function limpiar() {
                $("#cantidad").val(0);
            }  
        </script>
@if(Session('mensaje') == 'PedidoNoCrear')
    <script>
        Swal.fire({
            type: 'error',
            title: 'Error...',
            text: 'Debes ingresar todos los datos!'
        })
    </script>
@endif
@stop

@stop