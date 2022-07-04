@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'inactivos',
])


@section('content')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
@endsection
<div class="content">

    <div class="row">
        
        @if (Session::has('mensaje'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('mensaje') }}
        </div>
    @endif
    @can('Descargar causas')
    <a href="{{ route('Causa.exportarCausa') }}" data-bs-toggle="tooltip" data-bs-placement="top"
        title="Exportar registros causas"><img class="operaciones" src="{{ asset('paper') }}/icons/Icon_download.svg"
            alt=""></a>
            @endcan
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Clientes inactivos con causa</h4>
                </div>
                <div class="card-body">
                    <br>
                    <div class="table-responsive">
                        <table id="example" class="table table-hover table-borderless">
                            <thead class=" text-primary">
                                <tr>
                                    <th>Id Causa</th>
                                    <th>Id Comercio</th>
                                    <th>Nombre Consola</th>
                                    <th>Motivo</th>
                                    <th>Fecha</th>
                                    <th>Nombre Agente</th>
                                    <th>Ticket</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datosCausa as $Causa)
                                    <tr>
                                        <td>{{ $Causa->idCausa }}</td>
                                        <td>{{ $Causa->idComercio }}</td>
                                        <td>{{ $Causa->nombreConsola }}</td>
                                        <td>{{ $Causa->motivo }}</td>
                                        <td>{{ $Causa->fecha }}</td>
                                        <td>{{ $Causa->nombreAgente }}</td>
                                        <td>{{ $Causa->ticket }}</td>
                                        <td><label class="switch">
                                            <input data-id="{{ $Causa->idCliente }}" class="mi_checkbox"
                                                data-onstyle="success" data-offstyle="danger"
                                                data-toggle="toggle" data-on="Active" data-off="InActive"
                                                type="checkbox" name="state" id="state"
                                                {{ $Causa->state ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                        <td>
                                            @can('Editar causas')
                                                <a href="#PlaceModal2-{{$Causa->idCausa }}"
                                                    data-toggle="modal"data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Editar motivo"><img class="operaciones"
                                                        src="{{ asset('paper') }}/icons/Icon_edit.svg"
                                                        alt=""></a>
                                                     <!-- Modal -->
                                            <div class="modal fade"
                                            id="PlaceModal2-{{$Causa->idCausa }}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden=true data-keyboard="false" data-backdrop="static">
                                            <div class="modal-dialog modal-xl" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="ventanaModalLabel">Formulario</h5>
                                                        <button type="button" onclick=" limpiarFormularioCausa()" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><img src="{{ asset('paper') }}/icons/Icon_x.svg"
                                                        alt=""></span>
                                                  </button>
                                                    </div>
                                                    <div class="modal-body">

                                                @include('Causa.editar')

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            @endcan
                                            <a href="{{ route('Causas.show', $Causa->idCausa) }}" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Ver detalles">
                                                <img src="{{ asset('paper') }}/icons/Icon_eye.svg"
                                                    alt="">
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
        function limpiarFormularioCausa() {
    document.getElementById("miFormCausa").reset();
  };
        $('.mi_checkbox').change(function() {
                //Verifico el estado del checkbox, si esta seleccionado sera igual a 1 de lo contrario sera igual a 0
                var state = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');
                console.log(state, id);
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('Cliente.habilitar') }}',
                    data: {
                        'idCliente': id
                    },

                })

            });
    </script>
@endsection

@endsection
