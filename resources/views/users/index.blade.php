@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'usuarios',
])

@section('content')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
@endsection
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card " style="margin-left:40px; width: 63rem;">
                <div class="card-header">
                    <h4 class="card-title">Usuarios</h4>
                </div>
                <div class="card-body">
                    <br>
                    <div class="table-responsive">
                        <table id="example"  class="table table-hover table-borderless">
                            <thead class=" text-primary">
                                <tr>
                                    <th>Id</th>
                                    <th>Usuario</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datosUser as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td> {{ $user->email }}</td>
                                            <td> {{ $user->roles()->first()->name}}</td>
                                            <td><label class="switch">
                                                    <input data-id="{{$user->id}}" class="mi_checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive"
                                                        type="checkbox" name="estadoUsuario" id="estadoUsuario"
                                                        {{ $user->estadoUsuario ? 'checked' : '' }}>
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td>
                                               
                                                <a href="#PlaceModal4-{{$user->id}}"
                                                    data-toggle="modal" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Editar"><img class="operaciones"
                                                        src="{{ asset('paper') }}/icons/Icon_edit.svg"
                                                        alt=""></a>
                                                     <!-- Modal -->
                                            <div class="modal fade" tabindex="-1"
                                            id="PlaceModal4-{{$user->id}}" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Editar tipo usuario
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true"><img src="{{ asset('paper') }}/icons/Icon_x.svg"
                                                                    alt=""></span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" >
                                                        @include('users.editar')
                                           
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <form action="{{ url('/User', $user->id) }}" method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <input type="image" class="operaciones"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Eliminar"
                                            src="{{ asset('paper') }}/icons/Icon_trash-2.svg"
                                            onclick="return confirm('¿Quieres borrar?')" value="Eliminar">

                                        </form>
                                            </td>
                                
                                @endforeach
                                </tr>
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
     $('.mi_checkbox').change(function() {
    //Verifico el estado del checkbox, si esta seleccionado sera igual a 1 de lo contrario sera igual a 0
    var estadoUsuario = $(this).prop('checked') == true ? 1 : 0; 
    var id = $(this).data('id'); 
        console.log(estadoUsuario, id);
    $.ajax({
        type: "GET",
        dataType: "json",
        url: '{{route('User.habilitar')}}',
        data: {'id': id},
       
        })
    });

    </script>
@endsection
@endsection
 