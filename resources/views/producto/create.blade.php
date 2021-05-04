@extends('adminlte::page')
@section('title', 'Nuevo producto')
@section('content_header')
    <h1>Crear producto</h1>
@stop
@section('plugins.Sweetalert2', true)
@section('content')

<form action="{{ url('/producto') }}" class="formulario-crear" method="post">
@csrf

@include('producto.form',['modo'=>''])

</form>
@section('js')
    <script>

    $('.formulario-crear').submit(function(e){
        e.preventDefault();

    Swal.fire({
  title: '¿Estas seguro de crear este producto?',
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