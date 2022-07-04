@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'Activos',
])        
        @section('content')
        <div class="content">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Comercio</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> {{  $Causa->cliente->nombreConsola }}</li>
                </ol>
              </nav>
        <section class="diamond-card">
            <div class="card-container">
                <div class="card">
                    <div class="card-content card-content-2">
                        <h5>Información detallada y clasificación comercio</h5>
                      <table  CELLPADDING="5"
                      ALIGN="LEFT" >
                        <tr>
                        <td><b>Id:</b> </td>
                        <td>{{  $Causa->cliente->idCliente }} </td>
                        </tr>
                        <tr>
                        <td><b>Id Comercio:</b> </td>
                        <td>{{  $Causa->cliente->idComercio }}</td>
                        </tr>
                        <tr>
                        <td><b>Tax Id:</b></td>
                        <td>{{  $Causa->cliente->taxId }}</td>
                        </tr>
                        <tr>
                        <td><b>Nombre razón social:</b></td>
                        <td>{{  $Causa->cliente->nombreRazon }} </td>
                            </tr>
                            <tr>
                        <td><b>Nombre en consola:</b> </td>
                        <td>{{  $Causa->cliente->nombreConsola }}</td>
                            </tr>
                            <tr>
                        <td><b>Nombre en Zendesk:</b> </td>
                        <td>{{  $Causa->cliente->nombreZendesk }}</td>
                    </tr>
                   <tr> 
                        <td><b> Categria:</b></td>
                        <td> {{  $Causa->cliente->categria }}</td>
                   </tr>
                   <tr>
                    <td><b>Estado:</b></td>
                    <td>
                        @switch( $Causa->cliente->state)
                            @case(true)
                            <span class="badge"
                            style="color:black; background-color:#63e057;">Activo
                        </span>
                            @break

                            @case(false)
                            <span class="badge"
                            style="color:black; background-color:#e72727;">Inactive
                        </span>
                            @break
                        @endswitch
                    </td>
                   </tr>
                   <tr>
                        <td><b>Nombre contacto:</b> </td>
                      <td>  {{  $Causa->cliente->nombreContacto }}</td>
                   </tr>
                   <tr>
                        <td><b>Email:</b></td>
                        <td>{{  $Causa->cliente->emailContacto }}</td>
                   </tr>
                   <tr>
                        <td><b>Url del comercio:</b> </td>
                        <td>{{  $Causa->cliente->merchanturl }}</td>
          
                    </tr>
                    </table>
                    </div>
               
                </div>
                <div class="card">
                    <div class="card-content card-content-4">
                        <h5>Canal de contacto usuarios finales</h5>
                        <table  CELLPADDING="5"
                        ALIGN="LEFT" >
                            <tr>
                                <td>
                                    <b>Telefono:</b>
                                </td>
                                <td>{{  $Causa->cliente->telefonoWeb }}</td>
                            </tr>
                            <tr>
                                <td><b>Email:</b></td>
                                <td>{{  $Causa->cliente->emailWeb }}</td>
                            </tr>
                            <tr>
                                <td><b>Chat web:</b></td>
                                <td> @switch( $Causa->cliente->chatWeb)
                                    @case(true)
                                    Sí aplica
                                @break
    
                                @case(false)
                                 No aplica
                                @break
                            @endswitch
                        </td>
                            </tr>
                        </table>
                    </div>
                     <div class="card-content card-content-1">
                          <h5>Contacto a comercio por intermitencias</h5>
                            <table CELLPADDING="5"
                            ALIGN="LEFT">
                                <tr>
                                    <td><b>Tipo contacto:</b></td>
                                    <td>@switch( $Causa->cliente->tipoContacto)
                                        @case(null)
                                          Sin tipo contacto
                                    @break
                                    @case('Mail')
                                        Mail
                                    @break
                                    @case('Slack')
                                     Slack
                                    @break
                                @endswitch</td>
                                </tr>
                                <tr>
                                    <td><b>Contacto:</b></td>
                                    <td> {{  $Causa->cliente->personaContacto }}</td>
                                </tr>
                                <tr>
                                    <td> <b>Email:</b></td>
                                    <td>{{  $Causa->cliente->personaEmmail }}</td>
                                </tr>
                            </table>
                    </div>
                </div>
                <div class="card-content card-content-3">
                    <h5> Datos de inactivación</h5>
                    <table  CELLPADDING="5"
                    ALIGN="LEFT" >
                        <tr>
                            <td>
                                <b>Motivo de inactividad:</b>
                            </td>
                            <td>{{ $Causa->motivo }}</td>
                        </tr>
                        <tr>
                            <td><b>Fecha de inactividad:</b></td>
                            <td>{{ $Causa->fecha }}</td>
                        </tr>
                        <tr>
                            <td><b>Nombre del agente:</b></td>
                            <td>{{ $Causa->nombreAgente }}</td>
                        </tr>
                        <tr>
                            <td><b>Ticket de inactividad:</b></td>
                            <td>{{ $Causa->ticket }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>   
        </div>
        @endsection  
