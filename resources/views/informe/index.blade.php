@extends('adminlte::page')
@section('title', 'Informes')
@section('content_header')
    <h1>Informes</h1>
@stop
@section('plugins.Sweetalert2', true)
@section('content')


<div class="table-responsive">

  <div class="d-flex">

  <table class="table" style="width: 100%">

      <thead class="">
          <tr>
              <th class="text-center">Número de pedido</th>
              <th class="text-center">Fecha</th>
              <th class="text-center">Sede</th>
              <th class="text-center">Estado</th>
              <th class="text-center">Documento</th>
              <th class="text-center">Primer nombre</th>
              <th class="text-center">Primer aprellido</th>
              <th class="text-center">Dirección</th>
              <th class="text-center">Telefono</th>
              <th class="text-center">Total</th>
              <th class="text-center">Opciones</th>
          </tr>
      </thead>

      <tbody>
      @foreach($datos as $pedido)
        <tr>
            <td class="text-center">{{ $pedido->id_pedido }}</td>
            <td class="text-center">{{ $pedido->fecha }}</td>
            <td class="text-center">{{ $pedido->sedePedido->nombre_sede }}</td>
            <td class="text-center" style="width: 150px">{{ $pedido->estadoPedido->nombre_estado }}</td>
            <td class="text-center">{{ $pedido->documento_cliente }}</td>
            <td class="text-center">{{ $pedido->nombre_cliente }}</td>
            <td class="text-center">{{ $pedido->apellido_cliente }}</td>
            <td class="text-center">{{ $pedido->direccion_cliente }}</td>
            <td class="text-center">{{ $pedido->telefono_cliente }}</td>
            <td class="text-center">{{ $pedido->total }}</td>
            <td class="text-center">
              
            <a type="button" class="btn btn-primary" href="/informe?id={{ $pedido->id_pedido }}">
              Detalle
            </a>
            </td>
        </tr>
    @endforeach

      </tbody>

  </table>
  
</div>

@if(count($productos) > 0)
    <div class="row">
      <div class="col">
        <table class="table text-center">
          <thead>
            <tr>
              <th>Producto</th>
              <th>Cantidad</th>
              <th>Precio</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
            @foreach($productos as $producto)
              <tr>
              <td>{{$producto->nombre_producto}}</td>
              <td>{{$producto->cantidad_c}}</td>
              <td>{{$producto->valor_producto}}</td>
              <td>{{$producto->valor_producto * $producto->cantidad_c}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
        </div>
        </div>
@endif

@section('js')

<script>

$('.formulario-estado').submit(function(e){
  e.preventDefault();
  Swal.fire({
  title: '¿Estás seguro de actualizar el estado?',
  text: "¡Lo puedes volver a cambiar!",
  icon: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: '¡Si, actualizar!',
  cancelButtonText: '¡Cancelar!'
  }).then((result) => {
    if (result.value) {
    this.submit();
    }
  })
});
    
     </script>
@stop
@stop