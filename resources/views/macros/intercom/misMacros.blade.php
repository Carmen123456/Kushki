@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'misMacrosIntercom',
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden=true data-keyboard="false" data-backdrop="static">
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
                    @include('macros.Intercom.registrar')

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
                    <h4 class="card-title">Macros Intercom</h4>
                </div>
                <div class="card-body">
                    <br>
                    <div class="table-responsive">
                        <table id="example"  class="table table-hover table-borderless">
                            <thead class=" text-primary">
                                <tr>
                                    <th>Id</th>
                                    <th>Respuesta</th>
                                    <th>Categoria</th>
                                    <th>Grupo</th>
                                    <th>Ultima actualización por:</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datosIntercom  as $MacrosIntercom)
                                    <th>{{ $MacrosIntercom->idMacroIntercom }}</th>
                                    <td>
                                        <a href="#PlaceModal-{{ $MacrosIntercom->idMacroIntercom }}" data-toggle="modal">
                                            <p style="text-overflow: ellipsis; width: 300px;
                padding: 2px 5px;   white-space: nowrap;
  overflow: hidden;">{{ $MacrosIntercom->mensaje }}
                                            </p>
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade" tabindex="-1"
                                            id="PlaceModal-{{ $MacrosIntercom->idMacroIntercom }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden=true data-keyboard="false" data-backdrop="static">
                                            <div class="modal-dialog modal-xl" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="ventanaModalLabel">Respuesta</h5>
                                                        <button type="button" onclick="limpiarFormulario()" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><img src="{{ asset('paper') }}/icons/Icon_x.svg"
                                                        alt=""></span>
                                                  </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <p style="width: 450px;" id="textArea">
                                                            {{ $MacrosIntercom->mensaje }}</p>

                                                        <button id="btn" onclick="copyToClickBoard()">Copy</button>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                    </div>
                    <td>{{ $MacrosIntercom->categoria }}</td>
                
                    <td>
                        @switch($MacrosIntercom->grupo)
                            @case(true)
                                <a href="{{ route('MacrosIntercom.cambiar', $MacrosIntercom->idMacroIntercom) }}">B2B</a>
                            @break

                            @case(false)
                                <a href="{{ route('MacrosIntercom.cambiar', $MacrosIntercom->idMacroIntercom) }}">B2C</a>
                            @break
                        @endswitch
                    </td>
                    <td>{{ $MacrosIntercom->usuario->name }}
                        <br>
                         <span class="badge " style=" color:black;">
                       {{$MacrosIntercom->updated_at}}</span></td>

                    <td>
                        @can('Editar mis macros')
                            <a href="#PlaceModal2-{{$MacrosIntercom->idMacroIntercom}}"
                                data-toggle="modal"data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Editar"><img class="operaciones"
                                src="{{ asset('paper') }}/icons/Icon_edit.svg"
                                alt=""></a>
                                 <!-- Modal -->
                        <div class="modal fade"
                        id="PlaceModal2-{{$MacrosIntercom->idMacroIntercom}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden=true data-keyboard="false" data-backdrop="static">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ventanaModalLabel">Formulario</h5>
                                    <button type="button" onclick=" limpiarFormularioEditar()" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><img src="{{ asset('paper') }}/icons/Icon_x.svg"
                                    alt=""></span>
                              </button>
                                </div>
                                <div class="modal-body">

                            @include('macros.intercom.editar')


                                </div>
                            </div>
                        </div>
                    </div>
                        @endcan
                        @can('Eliminar mis macros')
                            <form action="{{ url('/MacrosIntercom', $MacrosIntercom->idMacroIntercom) }}" method="post">
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
