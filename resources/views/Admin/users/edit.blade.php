@extends('adminlte::page')

@section('title','DeliveryCenter')

@section('content_header')
<h1>Asigancion de Roles</h1>
@stop

@section('content')


    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif
   <div class="card">
       <div class="card-body">
           <p class="h5">Nombre</p>
           <p class="form-control">{{$user->name}}</p>

           {!! Form::model($user, ['route' =>['admin.users.update', $user],'method' => 'put']) !!}
           @foreach($roles as $role)
           <div>
               <label>
                   {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                   {{$role->name}}
               </label>
           </div>
           @endforeach
             {!! Form::submit('Asignar Rol', ['class' => 'btn btn-success mt-2']) !!}
           {!! Form::close() !!}
       </div>
   </div>
@stop

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
@stop