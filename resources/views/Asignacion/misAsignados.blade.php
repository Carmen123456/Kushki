@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'misAsignados',
])


@section('content')
    <div class="content">
        <div class="row">

            @foreach ($datosAsignacion as $datosAsignacion)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card " style="width: 15rem;">
                        <div class="card-body">

                            <h5 class="card-title"> {{ $datosAsignacion->cliente->nombreConsola }}</h5>
                            <p class="card-text">
                                {{ $datosAsignacion->Kam }}</p>
                            <p>{{ $datosAsignacion->categoria }}</p>


                            <button class="btn btn-primary" href="#PlaceModal-{{ $datosAsignacion->idAsignacion }}"
                                data-toggle="modal">Info del comercio</button>
                            <!-- Modal -->
                            <div class="modal fade" tabindex="-1" id="PlaceModal-{{ $datosAsignacion->idAsignacion }}"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                Comercio:{{ $datosAsignacion->cliente->nombreConsola }} </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true"><img class="operaciones" src="{{ asset('paper') }}/icons/Icon_x.svg"
                                                    alt=""></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <p style="width: 450px;" id="textArea">
                                                {{ $datosAsignacion->cliente->nombreConsola }}</p>
                                            <p>{{ $datosAsignacion->cliente->idComercio }}</p>
                                            <p>{{ $datosAsignacion->cliente->nombreConsola }}</p>
                                            <p>{{ $datosAsignacion->cliente->nombreZendesk }}</p>
                                            <p>{{ $datosAsignacion->cliente->categria }}</p>
                                            <p>{{ $datosAsignacion->cliente->pais }}</p>
                                            <p>
                                                @switch($datosAsignacion->cliente->state)
                                                    @case(true)
                                                    <p>Activo</p>
                                                @break

                                                @case(false)
                                                    <p>Inactivo</p>
                                                @break
                                            @endswitch
                                            <p> {{ $datosAsignacion->cliente->nombreContacto }}</p>
                                            <p> {{ $datosAsignacion->cliente->emailContacto }}</p>
                                            <p> {{ $datosAsignacion->cliente->merchanturl }}</p>
                                            <P> @switch($datosAsignacion->cliente->tipoContacto)
                                                    @case(null)
                                                    <p>
                                                        Tipo contacto: &nbsp; Sin tipo contacto
                                                    </p>
                                                @break

                                                @case('Mail')
                                                    <p>
                                                        Tipo contacto: &nbsp; Mail</p>
                                                @break

                                                @case('Slack')
                                                    <p>Tipo contacto: Slack</p>
                                                @break
                                            @endswitch
                                            </p>
                                            <P> {{ $datosAsignacion->cliente->personaContacto }}</P>
                                            <P>{{ $datosAsignacion->cliente->personaEmmail }}</P>
                                            <p>;{{ $datosAsignacion->cliente->telefonoWeb }}</p>
                                            <p>{{ $datosAsignacion->cliente->emailWeb }}</p>
                                            <p>
                                                @switch($datosAsignacion->cliente->chatWeb)
                                                    @case(true)
                                                    <p>Chat web: &nbsp; Si aplica</p>
                                                @break

                                                @case(false)
                                                    <p>Chat web: &nbsp; No aplica</p>
                                                @break
                                            @endswitch
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
