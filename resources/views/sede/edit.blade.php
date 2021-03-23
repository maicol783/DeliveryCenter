@extends('adminlte::page')
@section('title', 'Editar sede')
@section('content_header')
    <h1>Editar sede</h1>
@stop
@section('plugins.Sweetalert2', true)
@section('content')

<form action="{{ url('/sede/'.$sede->id_sede ) }}" class="formulario-editar" method="post">

@csrf
{{ method_field('PATCH') }}

@include('sede.form')

</form>
@section('js')
    <script>

    $('.formulario-editar').submit(function(e){
        e.preventDefault();

    Swal.fire({
  title: '¿Estas seguro de editar esta sede?',
  text: "¡Puedes volver a editarlas!",
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



