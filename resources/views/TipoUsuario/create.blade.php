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

<form action="{{url('/TipoUsuario')}}" method="post">
    @csrf
    <label>Tipo usuario </label>
<input type="text" name="tipoUsuario" id="tipoUsuario">
<input type="submit" value="Guardar datos">
</form>
@endsection