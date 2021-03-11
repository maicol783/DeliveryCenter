<form action="{{ url('/empleado') }}" method="post">
@csrf

@include('empleado.form',['modo'=>''])

</form>