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
  <div class="col-xl-8">
        <form action="{{ route('entradaproducto.index') }}" method="get">
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
@if(Session('mensaje') == 'EntradaCrear')
<script>
Swal.fire(
  '¡Entrada creada!',
  'La entrada se ha registrado correctamente.',
  'success'
)
</script>
@endif
@stop
@stop