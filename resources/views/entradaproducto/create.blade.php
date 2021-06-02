@extends('adminlte::page')
@section('title', 'Nueva existencia')
@section('content_header')
    <h1>Agregar existencia de producto</h1>
@stop
@section('plugins.Sweetalert2', true)
@section('content')

<form action="{{ url('/entradaproducto') }}" class="formulario-crear" method="post">
@csrf

@include('entradaproducto.form',['modo'=>''])

</form>
@section('js')
    <script>

    $('.formulario-crear').submit(function(e){
        e.preventDefault();

    Swal.fire({
  title: '¿Estas seguro de agragar esta existencia?',
  text: "¡Podras eliminarla despues!",
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