@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'asignados',
])


@section('content')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
@endsection

<div class="content">
    <div class="row">

                <div>
            @can('Registrar asignacion')
            <!-- Button trigger modal -->
            <a href="#PlaceModalcrear" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top"
            title="Creae nuevo registro"><img class="operaciones"
                src="{{ asset('paper') }}/icons/Icon_plus-square.svg" alt=""></a>
    @endcan
    <!-- Modal -->
    <div class="modal fade" id="PlaceModalcrear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden=true data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ventanaModalLabel">Formulario</h5>
                    <button type="button" onclick="limpiarFormulario()" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><img src="{{ asset('paper') }}/icons/Icon_x.svg"
                    alt=""></span>
              </button>
                </div>
                <div class="modal-body">
                        @include('Asignacion.registrar')
    
                    </div>
                </div>
            </div>
        </div>
        @can('Descargar asignados')
        <a href="{{ route('Asignacion.exportar') }}" data-bs-toggle="tooltip" data-bs-placement="top"
            title="Exportar registros"><img class="operaciones" src="{{ asset('paper') }}/icons/Icon_download.svg"
                alt=""></a>
                @endcan
        <br>
            @if (Session::has('mensaje'))
    
                <div class="alert alert-success" role="alert">
                    <div> {{ Session::get('mensaje') }}
                        &nbsp;  &nbsp;  &nbsp; <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>

        @endif
        </div> 
        <div class="col-md-12"> 
        <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Asignados enterprise</h4>
                </div>
                <div class="card-body">
                    <br>
                    <div class="table-responsive">
                        <table id="example"  class="table table-hover table-borderless">
                            <thead class=" text-primary">

                                <tr>
                                    <th>Id</th>
                                    <th>Analista</th>
                                    <th>Comercio</th>
                                    <th>Kam</th>
                                    <th>Categoria</th>
                                    @can('Editar asignacion')
                                        <th>Acciones</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datosAsignacion as $datosAsignacion)
                                    <tr>
                                        <td>{{ $datosAsignacion->idAsignacion }}</td>
                                        <td>{{ $datosAsignacion->name }}</td>
                                        <td>{{ $datosAsignacion->nombreConsola}}</td>
                                        <td>{{ $datosAsignacion->Kam }}</td>
                                        <td>{{ $datosAsignacion->categoria }}</td>
                                        <td>
                                            @can('Editar asignacion')
                                                    <a href="#PlaceModal2-{{ $datosAsignacion->idAsignacion }}"
                                                        data-toggle="modal"data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Editar"><img class="operaciones"
                                                            src="{{ asset('paper') }}/icons/Icon_edit.svg"
                                                            alt=""></a>
                                                         <!-- Modal -->
                                                <div class="modal fade" tabindex="-1"
                                                id="PlaceModal2-{{ $datosAsignacion->idAsignacion }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden=true data-keyboard="false" data-backdrop="static">
                                                <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ventanaModalLabel">Formulario</h5>
                                                            <button type="button" onclick="limpiarFormularioEditar()" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true"><img src="{{ asset('paper') }}/icons/Icon_x.svg"
                                                            alt=""></span>
                                                      </button>
                                                        </div>
                                                        <div class="modal-body">
                                                    @include('Asignacion.editar')
    
    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endcan
                                            @can('Borrar asignacion')
                                                <form action="{{ url('/Asignacion', $datosAsignacion->idAsignacion) }}"
                                                    method="post">
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

        function limpiarFormulario() {
    document.getElementById("miForm").reset();
  };
  function limpiarFormularioEditar() {
    document.getElementById("miFormEdiar").reset();
  };
    </script>
@endsection
@endsection
