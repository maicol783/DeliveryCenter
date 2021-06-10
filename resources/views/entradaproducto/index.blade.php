@extends('adminlte::page')
@section('title', 'Entradas de producto')
@section('content_header')
    <h1>Entradas de producto</h1>
@stop
@section('plugins.Sweetalert2', true)
@section('content')


<div class="table-responsive">

<div class="d-flex">
  @can('entradaproducto.create')
<a class="btn btn-success" href="{{ url('entradaproducto/create') }} " >Nueva entrada</a>
  @endcan
  <div class="col-5">
        <div class="input-group">
            <input type="text" class="form-control" id="texto" placeholder="Ingrese nombre">
            <div class="input-group-append"><span class="btn btn-outline-success">Buscar</span></div>
        </div>
        <div id="resultados" class="bg-light border"></div>
    </div>
</div>
<br>

<table class="table table-striped table-bordered table-hover" style="width: 100%">

    <thead class="">
        <tr>
            <th class="text-center">Nombre</th>
            <th class="text-center">Sede</th>
            <th class="text-center">Cantidad</th>
        </tr>
    </thead>

    <tbody>
    @foreach($datos as $entrada)
        <tr>
            <td class="text-center">{{ $entrada->nombre_producto }}</td>
            <td class="text-center">{{ $entrada->nombre_sede }}</td>
            <td class="text-center">{{ $entrada->cantidad_entrada }}</td>
        </tr>
    @endforeach
    </tbody>

</table>
<div class="card-footer mr-auto" style="background-color: #f4f6f9;">
    {{ $datos->links() }}
  </div>
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