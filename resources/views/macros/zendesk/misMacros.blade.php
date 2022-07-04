@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'misMacrosZendesk',
])


@section('content')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
@endsection
<div class="content">
    <div class="row"> 
    @can('Crear mis macros')
        <!-- Button trigger modal -->
        <a href="#exampleModal" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top"
        title="Creae nuevo registro"><img class="operaciones"
            src="{{ asset('paper') }}/icons/Icon_plus-square.svg" alt=""></a>
    @endcan
    <!-- Modal -->
    <div class="modal fade" id="exampleModal"tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden=true data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ventanaModalLabel">Respuesta</h5>
                    <button type="button" onclick="limpiarFormularioCrear()" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><img src="{{ asset('paper') }}/icons/Icon_x.svg"
                    alt=""></span>
              </button>
                </div>
                <div class="modal-body">
                    @include('macros.zendesk.registrar')

                </div>
            </div>
        </div>
    </div>
    @if (Session::has('mensaje'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('mensaje') }}
    </div>
@endif
<div class="col-md-12">
    <div class="card">
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
                                    <th>Operaciones</th>
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
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true"><img src="{{ asset('paper') }}/icons/Icon_x.svg"
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
                                <a href="{{ route('MacrosZendesk.cambiar', $MacrosZendesk->idMacroZendesk) }}">B2B</a>
                            @break

                            @case(false)
                                <a href="{{ route('MacrosZendesk.cambiar', $MacrosZendesk->idMacroZendesk) }}">B2C</a>
                            @break
                        @endswitch
                    </td>
                    <td>{{ $MacrosZendesk->usuario->name }}</td>

                    <td>
                        @can('Editar mis macros')
                            <a href="#PlaceModal2-{{$MacrosZendesk->idMacroZendesk}}"
                                data-toggle="modal"data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Editar"><img class="operaciones"
                                src="{{ asset('paper') }}/icons/Icon_edit.svg"
                                alt=""></a>
                                 <!-- Modal -->
                        <div class="modal fade"
                        id="PlaceModal2-{{$MacrosZendesk->idMacroZendesk}}"tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden=true data-keyboard="false" data-backdrop="static">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ventanaModalLabel">Respuesta</h5>
                                    <button type="button" onclick="limpiarFormularioEditar() " class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><img src="{{ asset('paper') }}/icons/Icon_x.svg"
                                    alt=""></span>
                              </button>
                                </div>
                                <div class="modal-body">

                            @include('macros.zendesk.editar')


                                </div>
                            </div>
                        </div>
                    </div>
                        @endcan
                        @can('Eliminar mis macros')
                            <form action="{{ url('/MacrosZendesk', $MacrosZendesk->idMacroZendesk) }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="image" class="operaciones"
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Eliminar"
                                src="{{ asset('paper') }}/icons/Icon_trash-2.svg"
                                onclick="return confirm('¿Quieres borrar?')" value="Eliminar">
                            </form>
                        @endcan
                    </td>
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
        function limpiarFormularioCrear() {
    document.getElementById("miFormCrear").reset();
  };
  function limpiarFormularioEditar() {
    document.getElementById("miFormEditar").reset();
  }; 
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
