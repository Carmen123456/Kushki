@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'tipo'
])

 
@section('content')
<br>
<br>
<br>
<br>
<br>
<br>


<form action="{{url('/TipoUsuario/'.$datosTipoUsuario->idTipoUsuario)}}" method="post">
@csrf
{{method_field('PATCH')}}
    <label>Tipo usuario </label>
    <input type="text" name="tipoUsuario" value="{{$datosTipoUsuario->tipoUsuario}}" id="tipoUsuario">
<input type="submit" value="Guardar datos">
</form>
@endsection