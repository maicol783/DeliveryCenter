@extends('adminlte::page')
@section('title', 'Nueva existencia')
@section('content_header')
    <h1>Agregar existencia de producto</h1>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
    .select2-selection {
        height: calc(2.25rem + 2px) !important;
    }
    </style>
@stop
@section('plugins.Sweetalert2', true)
@section('content')

<form action="{{ url('/entradaproducto') }}" class="formulario-crear" method="post">
@csrf

@include('entradaproducto.form',['modo'=>''])

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
  title: '¿Estás seguro de agregar esta existencia?',
  text: "¡No podras eliminarla despues!",
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

<script>
    function cargar_productos(e){
        $("#id_producto").html('<option value="">Seleccione un producto</option>');
        let id = $(e).val();
        $.ajax({
            url:'/traer_productos/'+id,
            type:'get',
            dataType:'json'
        }).done(respuesta=>{
            respuesta.map(r => $("#id_producto").append(`<option value="${r.id_producto}">${r.nombre_producto}</option>`));
        }).fail(q=>console.log(q))
    }
</script>
@stop

@stop