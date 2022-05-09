@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'Activos'
])

 
@section('content')
<br>

<div class="content">
    <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6" style="max-width: 20rem;">
        <div class="card card-stats">
        <div class="card-body">
            
          <h5 class="card-title" style="color: #8F4F8B">Información detallada y clasificación Comercio</h5>
          <p>Id: {{$Cliente->idCliente}}</p>
                <p>Id Comercio: &nbsp; {{$Cliente->idComercio}}</p>
                <p>Tax Id: &nbsp; {{$Cliente->taxId}}</p>
                <p>Nombre razón social: &nbsp; {{$Cliente->nombreRazon}}</p>
                <p>Nombre en consola: &nbsp; {{$Cliente->nombreConsola}}</p>
                <p>Nombre en Zendesk: &nbsp; {{$Cliente->nombreZendesk}}</p>
        </div>
      </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6" style="max-width: 20rem;">
        <div class="card card-stats">
        <div class="card-body">
            
          <h5 class="card-title" style="color: #8F4F8B">Información detallada y clasificación Comercio</h5>
                <p> Categria:  &nbsp; {{$Cliente->categria}}</p> 
          @switch($Cliente->state)
          @case(true)
  <p>Estado: Activo</p>
           @break
@case(false)
<p>Estado: Inactivo</p>
@break
  @endswitch
          <p>Nombre contacto: &nbsp; {{$Cliente->nombreContacto}}</p>
          <p>Email: &nbsp; {{$Cliente->emailContacto}}</p>
          <p>Url del comercio: &nbsp;  {{$Cliente->merchanturl}}</p>
        </div>
      </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6" style="max-width: 20rem;">
        <div class="card card-stats">
        <div class="card-body">
          <h5 class="card-title" style="color: #ffee00">Datos contacto a comercio por intermitencias</h5>
          <P>   @switch($Cliente->tipoContacto)
            @case(null)
                    <p>
                        Tipo contacto: &nbsp;  Sin tipo contacto
                    </p>
                    @break
                    @case('Mail')
                    <p>
                        Tipo contacto: &nbsp; Mail</p>
                     @break
        @case('Slack')
        <p>Tipo contacto: Slack</p>
        @break
            @endswitch</P>
          <P>Contacto:&nbsp; {{$Cliente->personaContacto}}</P>
          <P> Email: &nbsp;{{$Cliente->personaEmmail}}</P>
        </div>
      </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6" style="max-width: 20rem;">
        <div class="card card-stats">
        <div class="card-body">
          <h5 class="card-title" style="color: #ff5e00">Canal de contacto usuarios finales</h5>
          <p>Telefono &nbsp;{{$Cliente->telefonoWeb}}</p>
          <p>Email &nbsp;{{$Cliente->emailWeb}}</p>
          <p>@switch($Cliente->chatWeb)
            @case(true)
    <p>Chat web:  &nbsp; Si aplica</p>
             @break
@case(false)
<p>Chat web:  &nbsp; No aplica</p>
@break
    @endswitch</p>
        </div>
      </div>
      </div>
    </div>
</div>
@endsection
