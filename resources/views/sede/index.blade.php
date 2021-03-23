@extends('adminlte::page')
@section('title', 'Sedes')
@section('content_header')
    <h1>Sedes</h1>
@stop
@section('plugins.Sweetalert2', true)
@section('content')


<div class="table-responsive">

<div>
<a class="btn btn-success" href="{{ url('sede/create') }}">Nueva sede</a>
</div>
<br>

<table class="table table-striped table-bordered table-hover" style="width: 100%">

    <thead class="">
        <tr>
            <th class="text-center">Nombre</th>
            <th class="text-center">Direccion</th>
            <th class="text-center">Barrio</th>
            <th class="text-center">Municipio</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach($sedes as $sede)
        <tr>
            <td class="text-center">{{ $sede->nombre_sede }}</td>
            <td class="text-center">{{ $sede->direccion_sede }}</td>
            <td class="text-center">{{ $sede->barrioSede->nombre_barrio  }}</td>
            <td class="text-center">{{ $sede->municipioSede->nombre_municipio  }}</td>
            <td class="text-center">
            <div class="d-flex justify-content-center">
            <a class="btn btn-warning btn-sm mx-2" href="{{ url('/sede/'.$sede->id_sede.'/edit') }}">
            
                Editar
            
            </a>
            |
            <form action="{{ url('/sede/'.$sede->id_sede) }}" class="formulario-eliminar" method="post"> 
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

@section('js')
    <script>

    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();

    Swal.fire({
  title: '¿Estas seguro de eliminar esta sede?',
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
@if(Session('mensaje') == 'SedeEliminar')
<script>
Swal.fire(
  '¡Eliminado!',
  'La sede se ha eliminado correctamente.',
  'success'
)
</script>
@endif
@if(Session('mensaje') == 'SedeModificar')
<script>
Swal.fire(
  '¡Editada!',
  'La sede se ha editado correctamente.',
  'success'
)
</script>
@endif
@if(Session('mensaje') == 'SedeCrear')
<script>
Swal.fire(
  '¡Creada!',
  'La sede se ha creado correctamente.',
  'success'
)
</script>
@endif
@stop
@stop