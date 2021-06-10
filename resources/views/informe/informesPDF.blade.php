@extends('adminlte::page')
@section('title', 'Informes')
@section('content_header')
    <h1>Informes</h1>
@stop
@section('plugins.Sweetalert2', true)
@section('content')


<div class="table-responsive">

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
        <tr id="tr-{{$pedido->id_pedido}}">
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
          
          <p class="card-text">El total de ventas es de {{ $acu }}</p>
      </div>
  </div>
  </div>
  
</div>
@section('js')

@stop
@stop
