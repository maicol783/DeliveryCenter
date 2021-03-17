@extends('adminlte::page')
@section('title', 'Editar empleado')
@section('content_header')
    <h1>Editar empleado</h1>
@stop
@section('content')

<form action="{{ url('/empleado/'.$empleado->documento) }}" method="post">

@csrf
{{ method_field('PATCH') }}

@include('empleado.form',['modo'=>'readonly disabled'])

</form>

@stop

