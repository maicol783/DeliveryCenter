@extends('adminlte::page')
@section('title', 'Empleados')
@section('content_header')
    <h1>Empleados</h1>
@stop
@section('content')

@if(Session::has('mensaje'))

    {{ Session::get('mensaje') }}

@endif

<div class="table-responsive">

<div>
<a class="btn btn-success" href="{{ url('empleado/create') }}">Nuevo empleado</a>
</div>
<br>

<table class="table table-striped table-bordered table-hover" style="width: 100%">

    <thead class="">
        <tr>
            <th class="text-center">Documento</th>
            <th class="text-center">Primer nombre</th>
            <th class="text-center">Segundo nombre</th>
            <th class="text-center">Primer apellido</th>
            <th class="text-center">Segundo apellido</th>
            <th class="text-center">Celular</th>
            <th class="text-center">Telefono</th>
            <th class="text-center">Correo</th>
            <th class="text-center">Contraseña</th>
            <th class="text-center">Grupo sanguineo</th>
            <th class="text-center">Sede</th>
            <th class="text-center">Rol</th>
            <th class="text-center" width="20%">Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach($empleados as $empleado)
        <tr>
            <td class="text-center">{{ $empleado->documento }}</td>
            <td class="text-center">{{ $empleado->primer_nombre }}</td>
            <td class="text-center">{{ $empleado->segundo_nombre }}</td>
            <td class="text-center">{{ $empleado->primer_apellido }}</td>
            <td class="text-center">{{ $empleado->segundo_apellido }}</td>
            <td class="text-center">{{ $empleado->celular }}</td>
            <td class="text-center">{{ $empleado->telefono }}</td>
            <td class="text-center">{{ $empleado->correo }}</td>
            <td class="text-center">{{ $empleado->contraseña }}</td>
            <td class="text-center">{{ $empleado->grupo_sanguineo }}</td>
            <td class="text-center">{{ $empleado->sedeEmpleado->nombre_sede }}</td>
            <td class="text-center" style = "width:50px">{{ $empleado->rolEmpleado->nombre_rol }}</td>
            <td class="text-center">

            <a class="btn btn-warning btn-sm" href="{{ url('/empleado/'.$empleado->documento.'/edit') }}">
            
                Editar
            
            </a>
            |
            <form action="{{ url('/empleado/'.$empleado->documento) }}" method="post"> 
            @csrf  

                {{ method_field('DELETE') }} 
                <input  class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Esta seguro de eliminar este usuario?')" value="Borrar">
            
            </form>
            
            </td>
        </tr>
    @endforeach
    </tbody>

</table>
</div>
@stop
