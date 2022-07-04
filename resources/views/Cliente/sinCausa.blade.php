@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'sinCausa',
])


@section('content')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
@endsection
<div class="content">
    <div class="row">
        <div>
        @can('Registrar comercios')
        <!-- Button trigger modal -->

        <a href="#PlaceModalcrear" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top"
            title="Creae nuevo registro"><img class="operaciones"
                src="{{ asset('paper') }}/icons/Icon_plus-square.svg" alt=""></a>
    @endcan
    <!-- Modal -->
    <div class="modal fade" tabindex="-1" id="PlaceModalcrear" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" style="margin-left: 400px">
            <div class="modal-content" style="width: 700px">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Crear</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><img src="{{ asset('paper') }}/icons/Icon_x.svg" alt=""></span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('Cliente.create')
                </div>
            </div>
        </div>
    </div>
    @can('Descargar comercios')
    <a href="{{ route('Cliente.exportarInactivo') }}" data-bs-toggle="tooltip" data-bs-placement="top"
    title="Exportar registros inactivos"><img class="operaciones" src="{{ asset('paper') }}/icons/Icon_download.svg"
        alt=""></a>
        @endcan
    @can('Cargar causas')
   
    <a href="#PlaceModalImportar" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Importar causas de inactividad" class="operaciones"><img class="operaciones"
                        src="{{ asset('paper') }}/icons/Icon_share.svg" alt=""></a>
                <div class="modal fade" tabindex="-1" id="PlaceModalImportar" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="margin-left: 500px">
                        <div class="modal-content" style="width: 500px">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Importar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><img src="{{ asset('paper') }}/icons/Icon_x.svg"
                                            alt=""></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('Causa.importarCausa') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <input type="file" name="file">
                                    <button>Importar Causa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
 
    @endcan
</div>
    @if (Session::has('mensaje'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('mensaje') }}
                                    </div>
                                @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Comercios</h4>
                </div>
                <div class="card-body">
                    <br>
                    <div class="table-responsive">
                        <table id="example"  class="table table-hover table-borderless">
                            <thead class=" text-primary">

                                <tr>
                                    <th>Id Comercio</th>
                                    <th>Razón social</th>
                                    <th>Nombre Consola</th>
                                    <th>Nombre Zendesk</th>
                                    <th>Categoria</th>
                                    <th>País</th>
                                    <th>Estado</th>
                                    <th>Ultimamente</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            </thead>
                            <tbody>
                                @foreach ($datosCliente as $Cliente)
                                    <tr>
                                        <td>{{ $Cliente->idComercio }}</td>
                                        <td> {{ $Cliente->nombreRazon }}</td>
                                        <td>{{ $Cliente->nombreConsola }}</td>
                                        <td>{{ $Cliente->nombreZendesk }}</td>
                                        <td>{{ $Cliente->categria }}</td>
                                        <td>{{ $Cliente->pais }}</td>
                                        <td><label class="switch">
                                            <input data-id="{{ $Cliente->idCliente }}" class="mi_checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive"
                                                type="checkbox" name="state" id="state"
                                                {{ $Cliente->state ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>

                                        <td>{{ $Cliente->name }}
                                            <br>
                                          <span class="badge " style=" color:black;">
                                             {{$Cliente->updated_at}}</span></td>
                                        <td> @can('Editar comercios')
                                                <!-- Button trigger modal -->
                                                <a href="#PlaceModal5-{{ $Cliente->idCliente }}" data-toggle="modal"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"><img
                                                        class="operaciones"
                                                        src="{{ asset('paper') }}/icons/Icon_edit.svg" alt=""></a>
                                                <!-- Modal -->
                                                <div class="modal fade" tabindex="-1"
                                                    id="PlaceModal5-{{ $Cliente->idCliente }}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden=true data-keyboard="false" data-backdrop="static">
                                                    <div class="modal-dialog modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="ventanaModalLabel">Editar causa</h5>
                                                                <button type="button" onclick="limpiarFormularioCausaEditar()" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true"><img src="{{ asset('paper') }}/icons/Icon_x.svg"
                                                                alt=""></span>
                                                          </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @include('Cliente.editar')
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endcan @can('Eliminar comercios')
                                                <form action="{{ url('/Cliente', $Cliente->idCliente) }}"
                                                    method="post">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <input type="image" class="operaciones" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Eliminar"
                                                        src="{{ asset('paper') }}/icons/Icon_trash-2.svg"
                                                        onclick="return confirm('¿Quieres borrar?')" value="Eliminar">
                                                </form>
                                            @endcan
                                            @can('Inactivar comercios')
                                                        <a href="#PlaceModal2-{{ $Cliente->idCliente }}"
                                                            data-toggle="modal"  data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Definir causa" class="operaciones">
                                                            <img src="{{ asset('paper') }}/icons/Icon_paperclip.svg" alt=""  ></a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" tabindex="-1"
                                                            id="PlaceModal2-{{ $Cliente->idCliente }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden=true data-keyboard="false" data-backdrop="static">
                                                            <div class="modal-dialog modal-xl" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="ventanaModalLabel">Formulario</h5>
                                                                        <button type="button" onclick="limpiarFormularioCausaCrear()" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true"><img src="{{ asset('paper') }}/icons/Icon_x.svg"
                                                                        alt=""></span>
                                                                  </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                    
                                                                        @include('Causa.create')
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                           @endcan
                                            <a href="{{ route('Cliente.show', $Cliente->idCliente) }}"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Ver detalles" >
                                                <img src="{{ asset('paper') }}/icons/Icon_eye.svg" alt="" class="operaciones">
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
        
        function limpiarFormulario() {
    document.getElementById("miForm").reset();
  };
  function limpiarFormularioEditar() {
    document.getElementById("miFormEdiar").reset();
  };
        function limpiarFormularioCausaCrear() {
    document.getElementById("miFormCausaCrear").reset();
  };
         $('.mi_checkbox').change(function() {
        //Verifico el estado del checkbox, si esta seleccionado sera igual a 1 de lo contrario sera igual a 0
        var state = $(this).prop('checked') == true ? 1 : 0; 
        var id = $(this).data('id'); 
            console.log(state, id);
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{route('Cliente.habilitar')}}',
            data: {'idCliente': id},
           
            })
        
    }); 
        </script>
@endsection
@endsection
