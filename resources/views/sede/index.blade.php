@extends('adminlte::page')
@section('title', 'Sedes')
@section('content_header')
    <h1>Sedes</h1>
@stop
@section('plugins.Sweetalert2', true)
@section('content')


<div class="table-responsive">

<div class="d-flex">
<a class="btn btn-success" href="{{ url('sede/create') }}">Nueva sede</a>

<form class="d-flex mx-auto float-right">
    <input name="buscarporsede"  style="width: 85%" class="form-control me-2" type="search" placeholder="Ingrese aquí" aria-label="Search" value="{{ $buscarporsede }}">
    <button class="btn btn-outline-success" type="submit">Buscar</button>
</form>
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