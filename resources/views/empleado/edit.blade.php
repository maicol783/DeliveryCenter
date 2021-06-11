@extends('adminlte::page')
@section('title', 'Editar empleado')
@section('content_header')
    <h1>Editar empleado</h1>
@stop
@section('plugins.Sweetalert2', true)
@section('content')

<form action="{{ url('/empleado/'.$empleado->documento) }}" class="formulario-editar" method="post">

@csrf
{{ method_field('PATCH') }}

@include('empleado.form',['modo'=>'readonly disabled'])

</form>
@section('js')
    <script>

    $('.formulario-editar').submit(function(e){
        e.preventDefault();

    Swal.fire({
  title: '¿Estás seguro de editar este empleado?',
  text: "¡Puedes volver a editarlos!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: '¡Sí, editar!',
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



