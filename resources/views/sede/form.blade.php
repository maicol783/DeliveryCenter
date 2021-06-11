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
            <p>Rellena los campos con la informacion de la nueva sede.</p>
        </div>

        <div class="form-content">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre_sede">Nombre de sede</label>
<input class="form-control" type="text" name="nombre_sede" id="nombre_sede" value="{{ isset($sede->nombre_sede)?$sede->nombre_sede:'' }}">
                    </div>
                    <div class="form-group">
                        <label for="direccion_sede">Dirección de sede</label>
<input class="form-control" type="text" name="direccion_sede" id="direccion_sede" value="{{ isset($sede->direccion_sede)?$sede->direccion_sede:'' }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        @if(isset($sede->id_sede))
<label for="Id_barrio">Barrio</label>
<select class="form-control" name="Id_barrio" id="Id_barrio">
    @foreach($barrio as $valor)
    @if($valor->id_barrio == $sede->id_barrio )
    <option value="{{ $valor->id_barrio }}" selected>{{ $valor->nombre_barrio }}</option>
    @else
    <option value="{{ $valor->id_barrio }}">{{ $valor->nombre_barrio }}</option>
    @endif
    @endforeach
</select>
                    </div>
                    <div class="form-group">
                        <label for="Id_municipio">Municipio</label>
<select  class="form-control" name="Id_municipio" id="Id_municipio">
    @foreach($municipio as $valor)
    @if($valor->id_municipio == $sede->id_municipio )
    <option value="{{ $valor->id_municipio }}" selected>{{ $valor->nombre_municipio }}</option>
    @else
    <option value="{{ $valor->id_municipio }}">{{ $valor->nombre_municipio }}</option>
    @endif
    @endforeach
</select>
                    </div>
                    <div class="form-group">
                        <label for="Estatus">Estado</label>
<select  class="form-control" name="Estatus" id="Estatus">
    @if($sede->estatus == 1)
    <option value="1" selected>Activo</option>
    <option value="2">Inactivo</option>
    @else
    <option value="1">Activo</option>
    <option value="2" selected>Inactivo</option>
    @endif
</select>
<br>
@else
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

<label for="Estatus">Estado</label>
<select  class="form-control" name="Estatus" id="Estatus">
    <option value="1">Activo</option>
    <option value="2">Inactivo</option>
</select>
<br>
@endif
                    </div>
                    
                </div>
            </div>
            <input class="text-right btn btn-info  btn-sm" type="submit" name="Enviar" value="Guardar datos">
<a class="text-right btn btn-info  btn-sm" href="{{ url('/sede/') }}">Atras</a>
        </div>
    </div>
</div>
