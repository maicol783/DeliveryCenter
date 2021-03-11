<form action="{{ url('/empleado') }}" method="post">
@csrf

<label for="Documento">Documento</label>
<input type="text" name="Documento" id="Documento">
<br>

<label for="Primer_nombre">Primer nombre</label>
<input type="text" name="Primer_nombre" id="Primer_nombre">
<br>

<label for="Segundo_nombre">Segundo nombre</label>
<input type="text" name="Segundo_nombre" id="Segundo_nombre">
<br>

<label for="Primer_apellido">Primer apellido</label>
<input type="text" name="Primer_apellido" id="Primer_apellido">
<br>

<label for="Segundo_apellido">Segundo apellido</label>
<input type="text" name="Segundo_apellido" id="Segundo_apellido">
<br>

<label for="Celular">Celular</label>
<input type="text" name="Celular" id="Celular">
<br>

<label for="Telefono">Telefono</label>
<input type="text" name="Telefono" id="Telefono">
<br>

<label for="Correo">Correo</label>
<input type="email" name="Correo" id="Correo">
<br>

<label for="Contraseña">Contraseña</label>
<input type="text" name="Contraseña" id="Contraseña">
<br>

<label for="Grupo_sanguineo">Grupo sanguineo</label>
<input type="text" name="Grupo_sanguineo" id="Grupo_sanguineo">
<br>

<label for="Id_sede">Sede</label>
<select name="Id_sede" id="Id_sede">
    <option value="1">Santa Lucia</option>
    <option value="2">San Javier</option>
    <option value="3">Poblado</option>
</select>
<br>

<label for="Id_rol">Rol</label>
<select name="Id_rol" id="Id_rol">
    <option value="1">Administrador</option>
    <option value="2">Sede</option>
    <option value="3">Central</option>
</select>
<br>

<input type="submit" name="Enviar" value="Guardar datos">

</form>