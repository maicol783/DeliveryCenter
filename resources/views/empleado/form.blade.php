<label for="Documento">Documento</label>
<input class="form-control" type="text" name="Documento" id="Documento" value="{{ isset($empleado->documento)?$empleado->documento:'' }}" {{$modo}} >
<br>

<label for="Primer_nombre">Primer nombre</label>
<input class="form-control" type="text" name="Primer_nombre" id="Primer_nombre" value="{{ isset($empleado->primer_nombre)?$empleado->primer_nombre:'' }}">
<br>

<label for="Segundo_nombre">Segundo nombre</label>
<input class="form-control" type="text" name="Segundo_nombre" id="Segundo_nombre" value="{{ isset($empleado->segundo_nombre)?$empleado->segundo_nombre:'' }}">
<br>

<label for="Primer_apellido">Primer apellido</label>
<input class="form-control" type="text" name="Primer_apellido" id="Primer_apellido" value="{{ isset($empleado->primer_apellido)?$empleado->primer_apellido:'' }}">
<br>

<label for="Segundo_apellido">Segundo apellido</label>
<input class="form-control" type="text" name="Segundo_apellido" id="Segundo_apellido" value="{{ isset($empleado->segundo_apellido)?$empleado->segundo_apellido:'' }}">
<br>

<label for="Celular">Celular</label>
<input class="form-control" type="text" name="Celular" id="Celular" value="{{ isset($empleado->celular)?$empleado->celular:'' }}">
<br>

<label for="Telefono">Telefono</label>
<input class="form-control" type="text" name="Telefono" id="Telefono" value="{{ isset($empleado->telefono)?$empleado->telefono:'' }}">
<br>

<label for="Correo">Correo</label>
<input class="form-control" type="email" name="Correo" id="Correo" value="{{ isset($empleado->correo)?$empleado->correo:'' }}">
<br>

<label for="Contraseña">Contraseña</label>
<input class="form-control" type="text" name="Contraseña" id="Contraseña" value="{{ isset($empleado->contraseña)?$empleado->contraseña:'' }}">
<br>

<label for="Grupo_sanguineo">Grupo sanguineo</label>
<input class="form-control" type="text" name="Grupo_sanguineo" id="Grupo_sanguineo" value="{{ isset($empleado->grupo_sanguineo)?$empleado->grupo_sanguineo:'' }}">
<br>

<label for="Id_sede">Sede</label>
<select class="form-control" name="Id_sede" id="Id_sede">
    <option value="1">Santa Lucia</option>
    <option value="2">San Javier</option>
    <option value="3">Poblado</option>
</select>
<br>

<label for="Id_rol">Rol</label>
<select  class="form-control" name="Id_rol" id="Id_rol">
    <option value="1">Administrador</option>
    <option value="2">Sede</option>
    <option value="3">Central</option>
</select>
<br>

<input class="text-right btn btn-info  btn-sm" type="submit" name="Enviar" value="Guardar datos">
<a class="text-right btn btn-info  btn-sm" href="{{ url('/empleado/') }}">Atras</a>
