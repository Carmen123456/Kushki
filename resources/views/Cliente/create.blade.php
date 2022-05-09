@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'Activos'
])

@section('content')
<br>
<br>
<br>
<div class="container">
<form method="post" action="{{url('/Cliente')}}" >
@csrf

<br>
<h2>Información detallada y clasificción de comercio</h2>
<br>
<div class="form-group">
<label for="">Id Comercio</label>
<input class="form-control" type="number" name="idComercio" id="idComercio">
</div>
<br>
<br>
<div class="form-group">
<label for="">Tax id</label>
<input class="form-control" type="text" name= "taxId" id="taxId">
</div>
<br>
<br>
<div class="form-group">
<label for="">Nombre/Razón social</label>
<input class="form-control" type="text" name="nombreRazon" id="nombreRazon">
</div>
<br>
<br>
<div class="form-group">
<label for="">Nombre consola</label>
<input class="form-control" type="text" name="nombreConsola" id="nombreConsola">
</div>
<br>
<br>
<div class="form-group">
<label for="">Nombre Zendesk</label>
<input class="form-control" type="text" name="nombreZendesk" id="nombreZendesk">
</div>
<br>
<br>
<div class="form-group">
<label for="">Categoria</label>
<select class="form-control" name="categria" id="categria">
  <option value="Enterprise">Enterprise</option>
  <option value="Medium">Medium</option>
  <option value="Small">Small</option>
</select>
</div>
<br>
<br>
<div class="form-group">
<label for="">Pais</label>
<select class="form-control" name="pais" id="pais">
  <option value="Colombia">Colombia</option>
  <option value="México">México</option>
  <option value="Perú">Perú</option>
  <option value="Ecuador">Ecuador</option>
</select>
</div>
<br>
<br>
<div class="form-group">
<label for="">Nombre contacto</label>
<input class="form-control" type="text" name="nombreContacto" id="nombreContacto">
</div>
<br>
<br>
<div class="form-group">
<label for="">Email</label>
<input class="form-control" type="email" name="emailContacto" id="emailContacto">
</div>
<br>
<br>
<div class="form-group">
<label for="">Merchant Url</label>
<input class="form-control" type="text" name="merchanturl" id="merchanturl">
</div>
<br>
<br>
<h2>Datos contacto a comercio por intermitencia</h2>
<br>
<br>
<div class="form-group">
<label for="">Nombre</label>
<input class="form-control" type="text" name="personaContacto" id="personaContacto ">
</div>
<br>
<br>
<div class="form-group">
<label for="">Email</label>
<input class="form-control" type="text" name="personaEmmail" id="personaEmmail">
</div>
<br>
<br>
<h2>Canal se contacto usuarios finales</h2>
<div class="form-group">
<label for="">Telefono</label>
<input class="form-control" type="text" name="telefonoWeb" id="telefonoWeb">
</div>
<br>
<br>
<div class="form-group">
<label for="">Email</label>
<input class="form-control" type="text" name="emailWeb" id="emailWeb">
</div>
<br>
<br>
<div class="form-group">
<label for="">Chat web</label>
<select class="form-control"  name="chatWeb" id="chatWeb">
  <option value="1">Si aplica</option>
  <option value="0">No aplica</option>
</select>
</div>
<br>
<br>
<input type="submit" value="Guardar datos">

</form>
</div>
        @endsection