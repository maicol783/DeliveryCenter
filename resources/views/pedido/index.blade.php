@extends('adminlte::page')
@section('title', 'Pedidos')
@section('content_header')
    <h1>Pedidos</h1>
@stop
@section('plugins.Sweetalert2', true)
@section('content')


<div class="table-responsive">

<div class="d-flex">
<a class="btn btn-success" href="{{ url('pedido/create') }}">Nuevo empleado</a>

<form class="d-flex mx-auto float-right">
    <input name="buscarporpedido"  style="width: 85%" class="form-control me-2" type="search" placeholder="Ingrese aquí" aria-label="Search" value="{{ $buscarporpedido }}">
    <button class="btn btn-outline-success" type="submit">Buscar</button>
</form>
</div>
<br>

<table class="table table-striped table-bordered table-hover" style="width: 100%">

    <thead class="">
        <tr>
            <th class="text-center">Id</th>
            <th class="text-center">Fecha</th>
            <th class="text-center">Sede</th>
            <th class="text-center">Estado</th>
            <th class="text-center">Documento</th>
            <th class="text-center">Primer nombre</th>
            <th class="text-center">Segundo nombre</th>
            <th class="text-center">Primer aprellido</th>
            <th class="text-center">Segundo aprellido</th>
            <th class="text-center">Direccion</th>
            <th class="text-center">Telefono</th>
            <th class="text-center">Celular</th>
            <th class="text-center">Opciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach($pedidos as $pedido)
        <tr>
            <td class="text-center">{{ $pedido->id_pedido }}</td>
            <td class="text-center">{{ $pedido->fecha }}</td>
            <td class="text-center">{{ $pedido->sedePedido->nombre_sede }}</td>
            <td class="text-center">{{ $pedido->estadoPedido->nombre_estado }}</td>
            <td class="text-center">{{ $pedido->documento_cliente }}</td>
            <td class="text-center">{{ $pedido->primerNombre_cliente }}</td>
            <td class="text-center">{{ $pedido->segundoNombre_cliente }}</td>
            <td class="text-center">{{ $pedido->primerApellido_cliente }}</td>
            <td class="text-center">{{ $pedido->segundoApellido_cliente }}</td>
            <td class="text-center">{{ $pedido->direccion_cliente }}</td>
            <td class="text-center">{{ $pedido->telefono_cliente }}</td>
            <td class="text-center">{{ $pedido->celular_cliente }}</td>
            <td class="text-center">
            <div class="d-flex justify-content-center">
            <a class="btn btn-warning btn-sm mx-2" href="{{ url('/pedido/'.$pedido->id_pedido.'/edit') }}">
            
                Editar
            
            </a>
            |
            <form action="{{ url('/pedido/'.$pedido->id_pedido) }}" class="formulario-eliminar" method="post"> 
            @csrf  

                {{ method_field('DELETE') }} 
                <input  class="btn btn-danger btn-sm mx-2" type="submit"  value="Borrar">
            
            </form>
            </div>
            </td>
        </tr>
    @endforeach
    </tbody>

</table>

</div>

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>


@section('js')

<script>

$('.formulario-eliminar').submit(function(e){
  e.preventDefault();
  Swal.fire({
  title: '¿Estas seguro de eliminar este empleado?',
  text: "¡No lo puedes revertir!",
  icon: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: '¡Si, eliminar!',
  cancelButtonText: '¡Cancelar!'
}).then((result) => {
  if (result.value) {
    this.submit();
  }
})
});
    
     </script>
@if(Session('mensaje') == 'EmpleadoEliminar')
<script>
Swal.fire(
  '¡Eliminado!',
  'El usuario se ha eliminado correctamente.',
  'success'
)
</script>
@endif
@if(Session('mensaje') == 'EmpleadoModificar')
<script>
Swal.fire(
  '¡Editado!',
  'El usuario se ha editado correctamente.',
  'success'
)
</script>
@endif
@if(Session('mensaje') == 'EmpleadoCrear')
<script>
Swal.fire(
  '¡Creado!',
  'El usuario se ha creado correctamente.',
  'success'
)
</script>
@endif
@stop
@stop