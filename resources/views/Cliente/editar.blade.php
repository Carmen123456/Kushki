@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'Activos'
])

@section('content')
<br>
<br>
<br>
<div class="container">
<form action="{{url('/Cliente/'.$datosCliente->idCliente)}}" method="post">
@csrf
{{method_field('PATCH')}}
    

<br>
<h2>Información detallada y clasificción de comercio</h2>
<br>
<label for="">Id Comercio</label>
<input type="number" name="idComercio" id="idComercio" value="{{$datosCliente->idComercio}}">
<br>
<br>
<label for="">Tax id</label>
<input type="text" name="taxId" id="taxId" value="{{$datosCliente->taxId}}">
<br>
<br>
<label for="">Nombre/Razón social</label>
<input type="text" name="nombreRazon" id="nombreRazon" value="{{$datosCliente->nombreRazon}}">
<br>
<br>
<label for="">Nombre consola</label>
<input type="text" name="nombreConsola" id="nombreConsola" value="{{$datosCliente->nombreConsola}}" >
<br>
<br>
<label for="">Nombre Zendesk</label>
<input type="text" name="nombreZendesk" id="nombreZendesk" value="{{$datosCliente->nombreZendesk}}">
<br>
<br>
<label for="">Categoria</label>
<select name="categria" id="categria">
  <option value="Enterprise">Enterprise</option>
  <option value="Medium">Medium</option>
  <option value="Small">Small</option>
</select>
<br>
<br>
<label for="">Pais</label>
<select name="pais" id="pais">
  <option value="Colombia">Colombia</option>
  <option value="Mexico">Mexico</option>
  <option value="Peru">Peru</option>
  <option value="Ecuador">Ecuador</option>
</select>
<br>
<br>
<label for="">Nombre contacto</label>
<input type="text" name="nombreContacto" id="nombreContacto" value="{{$datosCliente->nombreContacto}}">
<br>
<br>
<label for="">Email</label>
<input type="email" name="emailContacto" id="emailContacto" value="{{$datosCliente->emailContacto}}">
<br>
<br>
<label for="">Merchant Url</label>
<input type="text" name="merchanturl" id="merchanturl" value="{{$datosCliente->merchanturl}}">
<br>
<br>
<h2>Datos contacto a comercio por intermitencia</h2>
<br>
<br>
<label for="">Nombre</label>
<input type="text" name="personaContacto" id="personaContacto" value="{{$datosCliente->personaContacto}}">
<br>
<br>
<label for="">Email</label>
<input type="text" name="personaEmmail" id="personaEmmail" value="{{$datosCliente->personaEmmail}}">
<br>
<br>
<h2>Canal se contacto usuarios finales</h2>
<label for="">Telefono</label>
<input type="text" name="telefonoWeb" id="telefonoWeb" value="{{$datosCliente->telefonoWeb}}">
<br>
<br>
<label for="">Email</label>
<input type="text" name="emailWeb" id="emailWeb" value="{{$datosCliente->emailWeb}}">
<br>
<br>
<input type="submit" value="Guardar datos">

</form>
</div>
        @endsection