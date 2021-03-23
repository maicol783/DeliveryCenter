<label for="nombre_sede">Nombre de sede</label>
<input class="form-control" type="text" name="nombre_sede" id="nombre_sede" value="{{ isset($sede->nombre_sede)?$sede->nombre_sede:'' }}">
<br>

<label for="direccion_sede">Dirección de sede</label>
<input class="form-control" type="text" name="direccion_sede" id="direccion_sede" value="{{ isset($sede->direccion_sede)?$sede->direccion_sede:'' }}">
<br>

<label for="Id_barrio">Barrio</label>
<select class="form-control" name="Id_barrio" id="Id_barrio">
    @foreach($barrio as $valor)
    <option value="{{ $valor->id_barrio }}">{{ $valor->nombre_barrio }}</option>
    @endforeach
</select>
<br>

<label for="Id_municipio">Municipio</label>
<select  class="form-control" name="Id_municipio" id="Id_municipio">
    @foreach($municipio as $valor)
    <option value="{{ $valor->id_municipio }}">{{ $valor->nombre_municipio }}</option>
    @endforeach
</select>
<br>

<input class="text-right btn btn-info  btn-sm" type="submit" name="Enviar" value="Guardar datos">
<a class="text-right btn btn-info  btn-sm" href="{{ url('/sede/') }}">Atras</a>
