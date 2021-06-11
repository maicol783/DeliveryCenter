<style>
    .note
    {
        text-align: center;
        height: 80px;
        background: -webkit-linear-gradient(left, #ee530b, #ff8000);
        color: #fff;
        font-weight: bold;
        line-height: 80px;
    }
    .form-content
    {
        padding: 5%;
        border: 1px solid #ced4da;
        margin-bottom: 2%;
    }
    .form-control{
        border-radius:1.5rem;
    }
    .btnSubmit
    {
        border:none;
        border-radius:1.5rem;
        padding: 1%;
        width: 20%;
        cursor: pointer;
        background: #ff8000;
        color: #fff;
    }
    
    </style>

<div class="container register-form">
            <div class="form">
                <div class="note">
                    <p>Por favor llena los datos del nuevo producto</p>
                </div>

                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre_producto">Nombre</label>
<input class="form-control" type="text" name="nombre_producto" id="nombre_producto" value="{{ isset($producto->nombre_producto)?$producto->nombre_producto:'' }}">
                            </div>
                            <div class="form-group">
                                <label for="existencias">Existencias</label>
<input class="form-control" type="number" name="existencias" id="existencias" {{$modo}} value="{{ isset($producto->existencias)?$producto->existencias:'0' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="valor_producto">Precio</label>
<input class="form-control" type="text" name="valor_producto" id="valor_producto" value="{{ isset($producto->valor_producto)?$producto->valor_producto:'' }}">

</div>
<div class="form-group">
@if(isset($producto->id_producto))
<label for="Id_sede">Sede</label>
<select class="form-control" name="Id_sede" id="Id_sede">
@foreach($sede as $valor)
@if($valor->id_sede == $producto->id_sede )
@if($valor->estatus == 1)
<option value="{{ $valor->id_sede }}" selected>{{ $valor->nombre_sede }}</option>
@endif
@else
@if($valor->estatus == 1)
<option value="{{ $valor->id_sede }}">{{ $valor->nombre_sede }}</option>
@endif
@endif
@endforeach
</select>
<br>

<label for="Estatus">Estado</label>
<select  class="form-control" name="Estatus" id="Estatus">
@if($producto->estatus == 1)
<option value="1" selected>Activo</option>
<option value="2">Inactivo</option>
@else
<option value="1">Activo</option>
<option value="2" selected>Inactivo</option>
@endif
</select>
<br>
@else
<label for="Id_sede">Sede</label>
<select class="form-control" name="Id_sede" id="Id_sede">
@foreach($sede as $valor)
@if($valor->estatus == 1)
<option value="{{ $valor->id_sede }}">{{ $valor->nombre_sede }}</option>
@endif
@endforeach
</select>
<br>
<label for="Estatus">Estado</label>
<select  class="form-control" name="Estatus" id="Estatus">
<option value="1" >Activo</option>
<option value="2">Inactivo</option>
</select>
<br>
@endif</div>
</div>
</div>
<input class="text-right btn btn-info  btn-sm" type="submit" name="Enviar" value="Guardar datos">
<a class="text-right btn btn-info  btn-sm" href="{{ url('/producto/') }}">Atras</a>
</div>
</div>
</div>
