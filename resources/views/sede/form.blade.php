<label for="nombre_sede">Nombre de sede</label>
<input class="form-control" type="text" name="nombre_sede" id="nombre_sede" value="{{ isset($sede->nombre_sede)?$sede->nombre_sede:'' }}">
<br>

<label for="direccion_sede">Dirección de sede</label>
<input class="form-control" type="text" name="direccion_sede" id="direccion_sede" value="{{ isset($sede->direccion_sede)?$sede->direccion_sede:'' }}">
<br>

<label for="Id_barrio">Barrio</label>
<select class="form-control" name="Id_barrio" id="Id_barrio">
    <option value="1">Santa Lucia</option>
    <option value="2">San Javier</option>
    <option value="3">Poblado</option>
</select>
<br>

<label for="Id_municipio">Municipio</label>
<select  class="form-control" name="Id_municipio" id="Id_municipio">
    <option value="1">Medellín</option>
    <option value="2">Bello</option>
    <option value="3">Sabaneta</option>
</select>
<br>

<input class="text-right btn btn-info  btn-sm" type="submit" name="Enviar" value="Guardar datos">
<a class="text-right btn btn-info  btn-sm" href="{{ url('/sede/') }}">Atras</a>
