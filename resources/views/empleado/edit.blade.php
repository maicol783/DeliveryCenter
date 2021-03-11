<form action="{{ url('/empleado/'.$empleado->documento) }}" method="post">
@csrf
{{ method_field('PATCH') }}

@include('empleado.form')

</form>

