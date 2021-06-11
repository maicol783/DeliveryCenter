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
            <p class="text-center">Introduce los datos</p>
        </div>

        <div class="form-content">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" placeholder="documento" type="text" name="Documento" id="Documento" value="{{ isset($empleado->documento)?$empleado->documento:'' }}" {{$modo}} >
                    </div>
                    <div class="form-group">
                        <input class="form-control"  placeholder="primer nombre" type="text" name="Primer_nombre" id="Primer_nombre" value="{{ isset($empleado->primer_nombre)?$empleado->primer_nombre:'' }}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="segundo nombre" type="text" name="Segundo_nombre" id="Segundo_nombre" value="{{ isset($empleado->segundo_nombre)?$empleado->segundo_nombre:'' }}">
                    </div>
                    <div class="form-group">
                        <input class="form-control"  placeholder="Primer Apellido" type="text" name="Primer_apellido" id="Primer_apellido" value="{{ isset($empleado->primer_apellido)?$empleado->primer_apellido:'' }}">
                    </div>
                    <div class="form-group">
                        <input class="form-control"  placeholder="Segundo Apellido" type="text" name="Segundo_apellido" id="Segundo_apellido" value="{{ isset($empleado->segundo_apellido)?$empleado->segundo_apellido:'' }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control"  placeholder="Celular" type="text" name="Celular" id="Celular" value="{{ isset($empleado->celular)?$empleado->celular:'' }}">
                    </div>
                    <div class="form-group">
                        <input class="form-control"  placeholder="Telefono" type="text" name="Telefono" id="Telefono" value="{{ isset($empleado->telefono)?$empleado->telefono:'' }}">
                    </div>
                    <div class="form-group">
                        <input class="form-control"  placeholder="Correo" type="email" name="Correo" id="Correo" value="{{ isset($empleado->correo)?$empleado->correo:'' }}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text"  placeholder="RH \ Grupo Sanguineo" name="Grupo_sanguineo" id="Grupo_sanguineo" value="{{ isset($empleado->grupo_sanguineo)?$empleado->grupo_sanguineo:'' }}">
                    </div>
                    <div class="form-group">
                        @if(isset($empleado->documento))
<label for="Id_sede">Sede</label>
<select class="form-control" name="Id_sede" id="Id_sede">
    @foreach($sede as $valor)
    @if($valor->id_sede == $empleado->id_sede )
    <option value="{{ $valor->id_sede }}" selected>{{ $valor->nombre_sede }}</option>
    @else
    <option value="{{ $valor->id_sede }}">{{ $valor->nombre_sede }}</option>
    @endif
    @endforeach
</select>
<br>

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
@endif
                    </div>
                    <input class="text-right btn btn-danger  btn-sm" type="submit" name="Enviar" value="Guardar datos">
             <a class="text-right btn btn-warning  btn-sm" href="{{ url('/empleado/') }}">Atras</a>
                </div>
            </div>
            
        </div>
    </div>
</div>
