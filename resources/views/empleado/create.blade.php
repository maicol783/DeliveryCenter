@extends('adminlte::page')
@section('title', 'Nuevo empleado')
@section('content_header')
    <h1>Crear empleado</h1>
@stop
@section('plugins.Sweetalert2', true)
@section('content')

<form action="{{ url('/empleado') }}" class="formulario-crear" method="post">
@csrf

@include('empleado.form',['modo'=>''])

</form>
@section('js')
    <script>

    $('.formulario-crear').submit(function(e){
        e.preventDefault();

    Swal.fire({
  title: '¿Estas seguro de crear este empleado?',
  text: "¡Podras eliminarlo despues!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: '¡Si, crear!',
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