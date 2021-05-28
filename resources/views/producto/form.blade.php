 
<label for="nombre_producto">Nombre</label>
<input class="form-control" type="text" name="nombre_producto" id="nombre_producto" value="{{ isset($producto->nombre_producto)?$producto->nombre_producto:'' }}">
<br>

<label for="existencias">Existencias</label>
<input class="form-control" type="number" name="existencias" id="existencias" {{$modo}} value="{{ isset($producto->valor_producto)?$producto->valor_producto:'0' }}">
<br>

<label for="valor_producto">Precio</label>
<input class="form-control" type="text" name="valor_producto" id="valor_producto" value="{{ isset($producto->valor_producto)?$producto->valor_producto:'' }}">
<br>

@if(isset($producto->id_producto))
<label for="Estatus">Estado</label>
<select  class="form-control" name="Estatus" id="Estatus">
    @if($empleado->estatus == 1)
    <option value="1" selected>Activo</option>
    <option value="2">Inactivo</option>
    @else
    <option value="1">Activo</option>
    <option value="2" selected>Inactivo</option>
    @endif
</select>
<br>
@else
<label for="Estatus">Estado</label>
<select  class="form-control" name="Estatus" id="Estatus">
    <option value="1" >Activo</option>
    <option value="2">Inactivo</option>
</select>
<br>
@endif

<input class="text-right btn btn-info  btn-sm" type="submit" name="Enviar" value="Guardar datos">
<a class="text-right btn btn-info  btn-sm" href="{{ url('/producto/') }}">Atras</a>