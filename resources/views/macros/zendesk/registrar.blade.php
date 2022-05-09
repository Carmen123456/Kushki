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

    <form method="post" action="{{url('/MacrosZendesk')}}" >
        @csrf
<br>
<div class="form-group">
<label for="">Respuesta</label>
<textarea class="form-control"  type="textarea" name="respuesta" id="respuesta"></textarea>
</div>
<br>
<br>
<div class="form-group">
<label for="">Nombre plantilla</label>
<input class="form-control"  type="text" name="nombrePlantilla" id="nombrePlantilla">
</div>
<br>
<br>
<div class="form-group">
    <label for="">Aplicativo</label>
    <input class="form-control"  type="text" name="aplicativo" id="aplicativo">
    </div>
    <br>
    <br>
    <div class="form-group">
        <label for="">fecha Actualizacion</label>
        <input class="form-control"  type="text" name="fechaActualizacion" id="fechaActualizacion">
        </div>
        <br>
        <br>
<label for="">Grupo</label>
<select class="form-control" name="grupo" id="grupo">
  <option value="1">B2B</option>
  <option value="0">B2C</option>
</select>
<br>
        <br>
<input type="submit" value="Guardar datos">

</form>
        @endsection