@extends('adminlte::page')
@section('title', 'Productos')
@section('content_header')
    <h1>Productos</h1>
@stop
@section('plugins.Sweetalert2', true)
@section('content')


<div class="table-responsive">

<div class="d-flex"> 
<a class="btn btn-success " href="{{ url('producto/create') }}">Nuevo producto</a>

<form class="d-flex mx-auto float-right">
    <input name="buscarporproducto"  style="width: 85%" class="form-control me-2" type="search" placeholder="Ingrese aquí" aria-label="Search" value="{{ $buscarporproducto }}">
    <button class="btn btn-outline-success" type="submit">Buscar</button>
</form>
</div>
<br>

<table class="table table-striped table-bordered table-hover" style="width: 100%">

    <thead class="">
        <tr>
            <th class="text-center">Nombre</th>
            <th class="text-center">Existencias</th>
            <th class="text-center">Precio</th>
            <th class="text-center">Sede</th>
            <th class="text-center">Estado</th>
            <th class="text-center">Opciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach($productos as $producto)
        <tr>
            <td class="text-center">{{ $producto->nombre_producto }}</td>
            <td class="text-center">{{ $producto->existencias }}</td>
            <td class="text-center">{{ $producto->valor_producto }}</td>
            <td class="text-center">{{ $producto->sedeProducto->nombre_sede }}</td>
            <td class="text-center">
              @if($producto->estatus == 1)
                <button type="button" class="btn btn-sm btn-success">Activo</button>
              @else
                <button type="button" class="btn btn-sm btn-danger">Inactivo</button>
              @endif
            </td>
            <td class="text-center " >
            <div class="d-flex justify-content-center">
            <a class="btn btn-warning btn-sm mx-2" href="{{ url('/producto/'.$producto->id_producto.'/edit') }}">
            
                Editar
            
            </a>
            |
            <form action="{{ url('/producto/'.$producto->id_producto) }}" class="formulario-eliminar" method="post"> 
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
</div>

@section('js')
    <script>

    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();

    Swal.fire({
  title: '¿Estas seguro de eliminar este producto?',
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
@if(Session('mensaje') == 'ProductoEliminar')
<script>
Swal.fire(
  '¡Eliminado!',
  'El producto se ha eliminado correctamente.',
  'success'
)
</script>
@endif
@if(Session('mensaje') == 'ProductoModificar')
<script>
Swal.fire(
  '¡Editado!',
  'El producto se ha editado correctamente.',
  'success'
)
</script>
@endif
@if(Session('mensaje') == 'ProductoCrear')
<script>
Swal.fire(
  '¡Creado!',
  'El producto se ha creado correctamente.',
  'success'
)
</script>
@endif
@stop
@stop