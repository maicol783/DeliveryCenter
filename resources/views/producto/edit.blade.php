@extends('adminlte::page')
@section('title', 'Editar producto')
@section('content_header')
    <h1>Editar producto</h1>
@stop
@section('plugins.Sweetalert2', true)
@section('content')

<form action="{{ url('/producto/'.$producto->id_producto) }}" class="formulario-editar" method="post">

@csrf
{{ method_field('PATCH') }}

@include('producto.form',['modo'=>'readonly disabled'])

</form>

@section('js')
    <script>

    $('.formulario-editar').submit(function(e){
        e.preventDefault();

    Swal.fire({
  title: '¿Estas seguro de editar este producto?',
  text: "¡Puedes volver a editarlos!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: '¡Si, editar!',
  cancelButtonText: '¡Cancelar!'
}).then((result) => {
  if (result.value) {
    this.submit();
  }
})
});
    
</script>
@stop
@stop