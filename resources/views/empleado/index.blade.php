@extends('adminlte::page')
@section('title', 'Empleados')
@section('content_header')
    <h1>Empleados</h1>
@stop
@section('plugins.Sweetalert2', true)
@section('content')


<div class="table-responsive">

<div class="d-flex">
<a class="btn btn-success" href="{{ url('empleado/create') }}">Nuevo empleado</a>

<div class="col-xl-8">
        <form action="{{ route('empleado.index') }}" method="get">
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
            <th class="text-center">Documento</th>
            <th class="text-center">Primer nombre</th>
            <th class="text-center">Segundo nombre</th>
            <th class="text-center">Primer apellido</th>
            <th class="text-center">Segundo apellido</th>
            <th class="text-center">Celular</th>
            <th class="text-center">Telefono</th>
            <th class="text-center">Correo</th>
            <th class="text-center">Grupo sanguineo</th>
            <th class="text-center" style= "padding-right: 25px; padding-left: 25px;">Sede</th>
            <th class="text-center">Estado</th>
            <th class="text-center">Opciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach($empleados as $empleado)
        <tr>
            <td class="text-center">{{ $empleado->documento }}</td>
            <td class="text-center">{{ $empleado->primer_nombre }}</td>
            <td class="text-center">{{ $empleado->segundo_nombre }}</td>
            <td class="text-center">{{ $empleado->primer_apellido }}</td>
            <td class="text-center">{{ $empleado->segundo_apellido }}</td>
            <td class="text-center">{{ $empleado->celular }}</td>
            <td class="text-center">{{ $empleado->telefono }}</td>
            <td class="text-center">{{ $empleado->correo }}</td>
            <td class="text-center">{{ $empleado->grupo_sanguineo }}</td>
            <td class="text-center">{{ $empleado->sedeEmpleado->nombre_sede }}</td>
            <td class="text-center">
              @if($empleado->estatus == 1)
                <button type="button" class="btn btn-sm btn-success">Activo</button>
              @else
                <button type="button" class="btn btn-sm btn-danger">Inactivo</button>
              @endif
            </td>
            <td class="text-center">
            <div class="d-flex justify-content-center">
            <a class="btn btn-warning btn-sm mx-2" href="{{ url('/empleado/'.$empleado->documento.'/edit') }}">
            
                Editar
            
            </a>
            |
            <form action="{{ url('/empleado/'.$empleado->documento) }}" class="formulario-eliminar" method="post"> 
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
<div class="card-footer mr-auto" style="background-color: #f4f6f9;">
    {{ $empleados->links() }}
</div>


@section('js')

<script>

$('.formulario-eliminar').submit(function(e){
  e.preventDefault();
  Swal.fire({
  title: '¿Estás seguro de eliminar este empleado?',
  text: "¡No lo puedes revertir!",
  icon: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: '¡Sí, eliminar!',
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
  'El empleado se ha eliminado correctamente.',
  'success'
)
</script>
@endif
@if(Session('mensaje') == 'EmpleadoModificar')
<script>
Swal.fire(
  '¡Editado!',
  'El empleado se ha editado correctamente.',
  'success'
)
</script>
@endif
@if(Session('mensaje') == 'EmpleadoCrear')
<script>
Swal.fire(
  '¡Creado!',
  'El empleado se ha creado correctamente.',
  'success'
)
</script>
@endif
@stop
@stop