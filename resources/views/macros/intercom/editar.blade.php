@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'macros'
])

 
@section('content')
<br>
<br>
<br>
<br>
<br>
<br>
<form action="{{url('/MacrosIntercom/'.$datosIntercom->idMacroIntercom)}}" method="post">
@csrf
{{method_field('PATCH')}}
    

<br>
<label for="">Mensaje</label>
<input class="form-control"  type="textarea" name="mensaje" value="{{$datosIntercom->mensaje}}">
<br>
<br>
<label for="">Categoria</label>
<input  class="form-control"  type="text" name="categoria" id="categoria" value="{{$datosIntercom->categoria}}">
<br>
<br>
<input type="submit" value="Guardar datos">

</form>
        @endsection