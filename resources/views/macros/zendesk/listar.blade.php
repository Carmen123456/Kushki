@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'macrosZendesk',
])


@section('content')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
@endsection
<div class="content">
    <div class="row">
            @can('Descargar macros')
            <a href="{{ route('MacrosZendesk.exportar') }}" data-bs-toggle="tooltip" data-bs-placement="top"
                title="Exportar registros"><img class="operaciones" src="{{ asset('paper') }}/icons/Icon_download.svg"
                    alt=""></a>
                    @endcan
                    <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Macros Zendesk</h4>
                </div>
                <div class="card-body">
                    <br>
                    <div class="table-responsive">
                        <table id="example"  class="table table-hover table-borderless">
                            <thead class=" text-primary">
                                <tr>
                                    <th>Id</th>
                                    <th>Respuesta</th>
                                    <th>Nombre plantilla</th>
                                    <th>Aplicativo</th>
                                    <th>Fecha actualizacion</th>
                                    <th>Estado</th>
                                    <th>Grupo</th>
                                    <th>Ultima actualización por:</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datosZendesk as $MacrosZendesk)
                                    <th>{{ $MacrosZendesk->idMacroZendesk }}</th>
                                    <td>
                                        <a href="#PlaceModal-{{ $MacrosZendesk->idMacroZendesk }}" data-toggle="modal">
                                            <p style="text-overflow: ellipsis; width: 250px;
                padding: 2px 5px;   white-space: nowrap;
  overflow: hidden;">{{ $MacrosZendesk->respuesta }}
                                            </p>
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade" tabindex="-1"
                                            id="PlaceModal-{{ $MacrosZendesk->idMacroZendesk }}" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Respuesta</h5>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true"><img class="operaciones" src="{{ asset('paper') }}/icons/Icon_download.svg"
                                                                alt=""></span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <p style="width: 450px;" id="textArea">
                                                            {{ $MacrosZendesk->respuesta }}</p>

                                                        <button id="btn" onclick="copyToClickBoard()">Copy</button>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                    </div>
                    <td>{{ $MacrosZendesk->nombrePlantilla }}</td>
                    <td>{{ $MacrosZendesk->aplicativo }}</td>
                    <td>{{ $MacrosZendesk->fechaActualizacion }}</td>
                    <td>
                        @switch($MacrosZendesk->estadoMacros)
                            @case(true)
                                <a href="">Activo</a>
                            @break

                            @case(false)
                                <a href="">Inactivo</a>
                            @break
                        @endswitch
                    </td>
                    <td>
                        @switch($MacrosZendesk->grupo)
                            @case(true)
                                <p>B2B</p>
                            @break

                            @case(false)
                                <p>B2C</p>
                            @break
                        @endswitch
                    </td>
                    <td>{{ $MacrosZendesk->usuario->name }}
                        <br>
                        <span class="badge " style=" color:black;">
                            {{$MacrosZendesk->updated_at}}</span></td>
                    </tr>
                    </a>
                    @endforeach
                    </tbody>
                    </table>
                </div>
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

        function copyToClickBoard() {
            var content = document.getElementById('textArea').innerHTML;

            navigator.clipboard.writeText(content)
                .then(() => {
                    console.log("Text copied to clipboard...")
                })
                .catch(err => {
                    console.log('Something went wrong', err);
                })

        }
    </script>
@endsection
@endsection
