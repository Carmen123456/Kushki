@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'dashboard',
])
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big ">
                                    <img class="icon"
                                        src="{{ asset('paper') }}/img/carta/Filled icon_Cobro directo.svg" alt="">

                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Comercios Activos</p>
                                    <p class="card-title"> {{ $datosVerdad->activos }} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="{{ route('Cliente.index') }}"><img class="icon"
                                    src="{{ asset('paper') }}/icons/Icon_eye.svg" alt=""> Ver activos</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big ">
                                    <img class="icon"
                                        src="{{ asset('paper') }}/img/carta/Filled icon_Cancelación.svg" alt="">
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Comercios Inactivos</p>
                                    <p class="card-title"> {{ $datosFalsos->falsos }} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="{{ route('Cliente.listarInactivos') }}"><img class="icon"
                                    src="{{ asset('paper') }}/icons/Icon_eye.svg" alt=""> Ver inactivos</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big ">
                                    <img class="icon"
                                        src="{{ asset('paper') }}/img/carta/Filled icon_Confianza.svg" alt="">
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Comercios Enterprise</p>
                                    <p class="card-title"> {{ $datosEnter->Enterprises }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="{{ route('Cliente.enterprise') }}"> <img class="icon"
                                    src="{{ asset('paper') }}/icons/Icon_eye.svg" alt=""> Ver enterprise</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big ">
                                    <img class="icon"
                                        src="{{ asset('paper') }}/img/carta/Filled icon_Disperción de dinero.svg" alt="">
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Comercios Medium</p>
                                    <p class="card-title"> {{ $datosMedium->Medium }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="{{ route('Cliente.medium') }}"> <img class="icon"
                                    src="{{ asset('paper') }}/icons/Icon_eye.svg" alt=""> Ver medium</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big ">
                                    <img class="icon"
                                        src="{{ asset('paper') }}/img/carta/Filled icon_Cobro con Interés.svg" alt="">
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Comercios Small business</p>
                                    <p class="card-title">{{ $datosSmall->Small }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="{{ route('Cliente.medium') }}"> <img class="icon"
                                    src="{{ asset('paper') }}/icons/Icon_eye.svg" alt=""> Ver small</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-5 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big ">
                                    <img class="icon"
                                        src="{{ asset('paper') }}/img/bandera/Country ball_Colombia.png" alt="">
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Comercios en Colombia</p>
                                    <p class="card-title">{{ $datosColombia->Colombia }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="{{ route('Cliente.colombia') }}"> <img class="icon"
                                    src="{{ asset('paper') }}/icons/Icon_eye.svg" alt="">Ver comercios en Colombia</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big ">
                                    <img class="icon"
                                        src="{{ asset('paper') }}/img/bandera/Country ball_Chile.png" alt="">
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Comercios en Chile</p>
                                    <p class="card-title">{{ $datosChile->Chile }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="{{ route('Cliente.chile') }}"> <img class="icon"
                                    src="{{ asset('paper') }}/icons/Icon_eye.svg" alt="">Ver comercios en Chile</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big ">
                                    <img class="icon"
                                        src="{{ asset('paper') }}/img/bandera/Country ball_Ecuador.png" alt="">
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Comercios en Ecuador</p>
                                    <p class="card-title">{{ $datosEcuador->Ecuador }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="{{ route('Cliente.ecuador') }}"> <img class="icon"
                                    src="{{ asset('paper') }}/icons/Icon_eye.svg" alt="">Ver comercios en Ecuador</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big ">
                                    <img class="icon"
                                        src="{{ asset('paper') }}/img/bandera/Country ball_México.png" alt="">
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Comercios en México</p>
                                    <p class="card-title">{{ $datosMexico->Mexico }} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="{{ route('Cliente.mexico') }}"> <img class="icon"
                                    src="{{ asset('paper') }}/icons/Icon_eye.svg" alt="">Ver comercios en México</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big">
                                    <img class="icon"
                                        src="{{ asset('paper') }}/img/bandera/Country ball_Peru.png" alt="">
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Comercios en Perú</p>
                                    <p class="card-title">{{ $datosPeru->Peru }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="{{ route('Cliente.peru') }}"> <img class="icon"
                                    src="{{ asset('paper') }}/icons/Icon_eye.svg" alt="">Ver comercios en Perú</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script>
@endpush
@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
