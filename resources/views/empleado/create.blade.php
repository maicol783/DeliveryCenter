@extends('adminlte::page')
@section('title', 'Nuevo empleado')
@section('content_header')
    <h1>Crear empleado</h1>
@stop
@section('content')

<form action="{{ url('/empleado') }}" method="post">
@csrf

@include('empleado.form',['modo'=>''])

</form>

@stop