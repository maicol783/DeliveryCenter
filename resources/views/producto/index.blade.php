@extends('adminlte::page')
@section('title', 'Productos')
@section('content_header')
    <h1>Productos</h1>
@stop
@section('plugins.Sweetalert2', true)
@section('content')


<div class="table-responsive">

<div class="d-flex"> 
  @can('sede.create')
<a class="btn btn-success " href="{{ url('producto/create') }}">Nuevo producto</a>
@endcan

<div class="col-xl-8">
        <form action="{{ route('producto.index') }}" method="get">
          <div class="form-row">
            <div class="col-sm-4">
              <input  class="form-control" name="texto" value="{{ $texto  }}" type="search" placeholder="Ingrese aquí" aria-label="Search">
            </div>
            <div class="col-auto">
              <input type="submit" name="" value="Busca el producto" class="btn btn-outline-success">
            </div>
          </div>
        </form>
  </div>
</div>
<br>

<table class="table table-striped table-bordered table-hover" style="width: 100%">

    <thead class="">
        <tr>
            <th class="text-center">Nombre</th>
            <th class="text-center">Existencias</th>
            <th class="text-center">Precio</th>
            <th class="text-center">Sede</th>
            <th class="text-center">Estado</th> @can('sede.edit')
            <th class="text-center">Opciones</th>@endcan
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
            @can('sede.edit')
            <td class="text-center " >
            <div class="d-flex justify-content-center">
              
            <a class="btn btn-warning btn-sm mx-2" href="{{ url('/producto/'.$producto->id_producto.'/edit') }}">
            
                Editar
                
            </a>
           
            
            |
             @endcan
            <form action="{{ url('/producto/'.$producto->id_producto) }}" class="formulario-eliminar" method="post">
            @csrf  
       @can('producto.delete')
                {{ method_field('DELETE') }} 
                <input  class="btn btn-danger btn-sm mx-2" type="submit"  value="Borrar">
                @endcan
            </form>
            </div>
            </td>
        </tr>
    @endforeach
    </tbody>

</table>
<div class="card-footer mr-auto" style="background-color: #f4f6f9;">
    {{ $productos->links() }}
</div>
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