@extends('adminlte::page')
@section('title', 'Nuevo producto')
@section('content_header')
    <h1>Crear producto</h1>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
    .select2-selection {
        height: calc(2.25rem + 2px) !important;
    }
    </style>
@stop
@section('plugins.Sweetalert2', true)
@section('content')

<form action="{{ url('/producto') }}" class="formulario-crear" method="post">
@csrf

@include('producto.form',['modo'=>'readonly'])

</form>
@section('js')
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function(){
                $("select").select2();
            })
        </script>
    <script>

    $('.formulario-crear').submit(function(e){
        e.preventDefault();

    Swal.fire({
  title: '¿Estás seguro de crear este producto?',
  text: "¡Podrás eliminarlo despues!",
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