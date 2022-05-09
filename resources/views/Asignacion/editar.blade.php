@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'asignados'
])

 
@section('content')
<h4>Editar asignación </h4>
<form action="{{url('/Asignacion/'. $datosAsignacion->idAsignacion)}}" method="post">
    @csrf
    {{method_field('PATCH')}}
<div class="mt-4">
    <label for="usuarios" class="form-label">Analista
    </label>
    <select name="usuarios" id="usuarios" class="form-control" >
      
        <option value="{{$datosAsignacion->user_id}}"  style="background: white; " readonly>
            {{$datosAsignacion->usuario->name }}
        </option>

    </select>
</div>

<div class="mt-4">
    <label for="usuarios" class="form-label">Comercio

    </label>
    <select name="Clientes" id="Clientes" class="form-control">
        @foreach ($Clientes as $Comercio)
        <option value="{{$Comercio->idCliente}}" @if ($Comercio->idCliente ==$datosAsignacion->cliente_id)
            selected
            @endif>
            {{$Comercio->nombreConsola }}
        </option>

        @endforeach

    </select>

</div>

<div class="mt-4">
    <label for="Kam" class="form-label">KAM:</label>
    <input type="text" class="form-control" id="Kam" name="Kam" value="{{$datosAsignacion->Kam}}">

</div>

<div class="mt-4">
    <label for="categoria" class="form-label">Categoria:</label>
    <input type="text" style="background: white; " readonly class="form-control" id="categoria" name="categoria" value="{{$datosAsignacion->categoria}}">

</div>

<div class="mt-4">
    <input type="submit" value="Guardar datos">
</div>
</form>
@endsection
