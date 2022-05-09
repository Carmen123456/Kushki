@extends('layouts.app', [
    'class' => '',
    'elementActive' => ''
])

@section('content')
<br>
<br>
<br>
<br>
<br>
<br>

<form action="{{url('/MacrosZendesk/'.$datosZendesk ->idMacroZendesk)}}" method="post">
    @csrf
    {{method_field('PATCH')}}
    <br>
<div class="form-group">
<label for="">Respuesta</label>
<input class="form-control"  type="text" name="respuesta" id="respuesta" value="{{$datosZendesk->respuesta}}">
</div>
<br>
<br>
<div class="form-group">
<label for="">Nombre plantilla</label>
<input class="form-control"  type="text" name="nombrePlantilla" id="nombrePlantilla" value="{{$datosZendesk->nombrePlantilla}}">
</div>
<br>
<br>
<div class="form-group">
    <label for="">Aplicativo</label>
    <input class="form-control"  type="text" name="aplicativo" id="aplicativo" value="{{$datosZendesk->aplicativo}}">
    </div>
    <br>
    <br>
    <div class="form-group">
        <label for="">fecha Actualizacion</label>
        <input class="form-control"  type="text" name="fechaActualizacion" id="fechaActualizacion" value="{{$datosZendesk->fechaActualizacion}}">
        </div>
        <br>
        <br>
<input type="submit" value="Guardar datos">

</form>
        @endsection