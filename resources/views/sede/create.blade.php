@extends('adminlte::page')
@section('title', 'Nueva sede')
@section('content_header')
    <h1>Crear sede</h1>
@stop
@section('plugins.Sweetalert2', true)
@section('content')

<form action="{{ url('/sede') }}" class="formulario-crear" method="post">
@csrf

@include('sede.form')

</form>
@section('js')
    <script>

    $('.formulario-crear').submit(function(e){
        e.preventDefault();

    Swal.fire({
  title: '¿Estas seguro de crear esta sede?',
  text: "¡Podras eliminarla despues!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: '¡Sí, crear!',
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