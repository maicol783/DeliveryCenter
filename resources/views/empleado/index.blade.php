@extends('adminlte::page')
@section('title', 'Empleados')
@section('content_header')
    <h1>Empleados</h1>
@stop
@section('plugins.Sweetalert2', true)
@section('content')


<div class="table-responsive">

<div>
<a class="btn btn-success" href="{{ url('empleado/create') }}">Nuevo empleado</a>
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
            <th class="text-center">Contraseña</th>
            <th class="text-center">Grupo sanguineo</th>
            <th class="text-center">Sede</th>
            <th class="text-center">Rol</th>
            <th class="text-center" width="100px">Acciones</th>
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
            <td class="text-center">{{ $empleado->contraseña }}</td>
            <td class="text-center">{{ $empleado->grupo_sanguineo }}</td>
            <td class="text-center">{{ $empleado->sedeEmpleado->nombre_sede }}</td>
            <td class="text-center">{{ $empleado->rolEmpleado->nombre_rol }}</td>
            <td class="text-center">

            <a class="btn btn-warning btn-sm" href="{{ url('/empleado/'.$empleado->documento.'/edit') }}">
            
                Editar
            
            </a>
            |
            <form action="{{ url('/empleado/'.$empleado->documento) }}" class="formulario-eliminar" method="post"> 
            @csrf  

                {{ method_field('DELETE') }} 
                <input  class="btn btn-danger btn-sm" type="submit"  value="Borrar">
            
            </form>
            
            </td>
        </tr>
    @endforeach
    </tbody>

</table>
</div>

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
@if(Session('mensaje') == 'oke')
<script>
Swal.fire(
  '¡Eliminado!',
  'El usuario se ha eliminado correctamente.',
  'success'
)
</script>
@endif
@if(Session('mensaje') == 'okm')
<script>
Swal.fire(
  '¡Editado!',
  'El usuario se ha editado correctamente.',
  'success'
)
</script>
@endif
@if(Session('mensaje') == 'okc')
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