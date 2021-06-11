@extends('adminlte::page')
@section('title', 'Informes')
@section('content_header')
    <h1>Informes</h1>
@stop
@section('plugins.Sweetalert2', true)
@section('content')


<div class="table-responsive">

  <div class="d-flex">

  <div class="col-xl-8">
        <form action="{{ route('informe.index') }}" method="get">
          <div class="form-row" style="margin-bottom: 20px;">
            <div class="col-sm-4">
              <input  class="form-control" name="texto" value="{{ $texto  }}" type="date" placeholder="Ingrese aquí" aria-label="Search">
            </div>
            <div class="col-sm-4">
              <input  class="form-control" name="texto2" value="{{ $texto2  }}" type="date" placeholder="Ingrese aquí" aria-label="Search">
            </div>
            <div class="col-auto">
              <input type="submit" name="" value="Buscar rango" class="btn btn-outline-success">
            </div>
          </div>
        </form>
  </div>
  <br>
  
  </div>

  <table class="table table-striped table-bordered table-hover" style="width: 100%">

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
            <input type="hidden" value="{{ $acu = $acu + $pedido->total }}">
        </tr>
    @endforeach

      </tbody>

  </table>
  <div class="text-center">
  
        <div class="card col-5" style="margin-left: 350px;">
        <div class="card-header">
        <div class="card-body" style="padding-bottom: 0px; padding-top: 0px; padding-left: 0px; padding-right: 0px;">
        Total
        </div>
        </div>
      <div class="card-body">
          @if($texto == null && $texto2 == null)
          <p class="card-text">Seleccione un rango de ventas para mostrar el total</p>
          @else
          <p class="card-text">El total de ventas entre {{ $texto }} y {{ $texto2 }} es de {{ $acu }}</p>
          @endif
      </div>
  </div>
</div>


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