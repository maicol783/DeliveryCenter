<label for="id_sede">Sede</label>
<select onchange="cargar_productos(this)" class="form-control" name="id_sede" id="id_sede">
    <option value="">Seleccione una sede</option>
    @foreach($sede as $valor)
    <option value="{{ $valor->id_sede }}">{{ $valor->nombre_sede }}</option>
    @endforeach
</select>
<br>

<label for="id_producto">Producto</label>
<select  class="form-control" name="id_producto" id="id_producto">
    <option value="">Seleccione un producto</option>
</select>
<br>


<label for="cantidad_entrada">Cantidad de entradas</label>
<input class="form-control" type="numb" name="cantidad_entrada" id="cantidad_entrada" >
<br>

<div>
<input class="text-right btn btn-info  btn-sm" type="submit" name="Enviar" value="Guardar datos">
<a class="text-right btn btn-info  btn-sm" href="{{ url('/entradaproducto/') }}">Atras</a>
</div>
