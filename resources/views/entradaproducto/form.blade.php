<label for="id_producto">Producto</label>
<select  class="form-control" name="id_producto" id="id_producto">
    @foreach($producto as $valor)
    <option value="{{ $valor->id_producto }}">{{ $valor->nombre_producto }}</option>
    @endforeach
</select>
<br>

<label for="id_sede">Sede</label>
<select  class="form-control" name="id_sede" id="id_sede">
    @foreach($sede as $valor)
    <option value="{{ $valor->id_sede }}">{{ $valor->nombre_sede }}</option>
    @endforeach
</select>
<br>

<label for="cantidad_entrada">Cantidad de entradas</label>
<input class="form-control" type="numb" name="cantidad_entrada" id="cantidad_entrada" >
<br>


<input class="text-right btn btn-info  btn-sm" type="submit" name="Enviar" value="Guardar datos">
<a class="text-right btn btn-info  btn-sm" href="{{ url('/entradaproducto/') }}">Atras</a>
