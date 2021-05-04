 
<label for="nombre_producto">Nombre</label>
<input class="form-control" type="text" name="nombre_producto" id="nombre_producto" value="{{ isset($producto->nombre_producto)?$producto->nombre_producto:'' }}">
<br>

<label for="valor_producto">Precio</label>
<input class="form-control" type="text" name="valor_producto" id="valor_producto" value="{{ isset($producto->valor_producto)?$producto->valor_producto:'' }}">
<br>

<input class="text-right btn btn-info  btn-sm" type="submit" name="Enviar" value="Guardar datos">
<a class="text-right btn btn-info  btn-sm" href="{{ url('/producto/') }}">Atras</a>