<a href="{{ url('empleado/create') }}">Nuevo empleado</a>

<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>Documento</th>
            <th>Primer nombre</th>
            <th>Segundo nombre</th>
            <th>Primer apellido</th>
            <th>Segundo apellido</th>
            <th>Celular</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Contraseña</th>
            <th>Grupo sanguineo</th>
            <th>Sede</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach($empleados as $empleado)
        <tr>
            <td>{{ $empleado->documento }}</td>
            <td>{{ $empleado->primer_nombre }}</td>
            <td>{{ $empleado->segundo_nombre }}</td>
            <td>{{ $empleado->primer_apellido }}</td>
            <td>{{ $empleado->segundo_apellido }}</td>
            <td>{{ $empleado->celular }}</td>
            <td>{{ $empleado->telefono }}</td>
            <td>{{ $empleado->correo }}</td>
            <td>{{ $empleado->contraseña }}</td>
            <td>{{ $empleado->grupo_sanguineo }}</td>
            <td>{{ $empleado->id_sede }}</td>
            <td>{{ $empleado->id_rol }}</td>
            <td>

            <a href="{{ url('/empleado/'.$empleado->documento.'/edit') }}">
            
                Editar
            
            </a>
            |
            <form action="{{ url('/empleado/'.$empleado->documento) }}" method="post"> 
            @csrf  

                {{ method_field('DELETE') }} 
                <input type="submit" onclick="return confirm('¿Esta seguro de eliminar este usuario?')" value="Borrar">
            
            </form>
            
            </td>
        </tr>
    @endforeach
    </tbody>

</table>