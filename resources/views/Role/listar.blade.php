@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'tipo',
])

@section('content')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@endsection
<div class="content">
    <div class="row">
        <a href="#exampleModal" data-toggle="modal"data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top"
            title="Crear nuevo registro" class="operaciones"><img
                src="{{ asset('paper') }}/icons/Icon_plus-square.svg" alt=""></a>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Tipo Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><img src="{{ asset('paper') }}/icons/Icon_x.svg"
                                    alt=""></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('Role.create')
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tipo Usuario</h4>
                </div>
                <div class="card-body">
                    <br>
                    <div class="table-responsive">
                        <table id="example" class="table table-hover table-borderless">
                            <thead class=" text-primary">
                                <tr>
                
                                    <th>Tipo Usuario</th>
                                    <th>Permisos</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Roles as $Role)
                                <tr id="sid{{$Role->id}}">
                                        <td>{{ $Role->name }}</td>
                                        <td style="width: 440px;">
                                            @foreach ($Role->permissions as $permisos)
                                                <span class="badge"
                                                    style="color:black; background-color:#b3b7b6;">{{ $permisos->name }}
                                                </span>
                                            @endforeach
                                        </td>

                                        <td>
                                            <a href="javascript:void(0)"
                                                onclick="editarRol({{ $Role->id }})">editar</a>
                                            <!-- Modal -->

                                            <!-- Modal -->
                                            <div class="modal fade" id="editarModal" data-bs-backdrop="static"
                                                data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Modal title
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @include('Role.edit')
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="button"
                                                                class="btn btn-primary">Understood</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>
<script>
   $('#example').DataTable( {
    autoWidth: false,
        "language": {
            "lengthMenu": " Mostrar" +
            `<select class="custom-select custom-select-sm form-control form-control-sm">
                <option value='5'>5</option>
                <option value='10'>10</option>
                <option value='25'>25</option>
                <option value='50'>50</option>
                <option value='100'>100</option>
                <option value='- 1'>All</option>
                </select>`
            + "registros por página",
            "zeroRecords": "No se encuentra resultados.",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtrado de_MAX_ registros totales)",
            "search": 'Buscar:',
            "paginate":{
                'next': 'Siguiente',
                'previous':'Anterior'
            }
        }});

    function editarRol(id) {
        $.get('Role/'+id+'/edit', function(Role) {

            $('#idRole').val(Role.id);

            $('#nombreRole').val(Role.name);

            var permisos = (Role.permissions);// variable para almacenar el json de respuesta
            console.log(permisos); // mostrar la variable en consola
            let arreglo = []; //definir un arreglo
            for (let i in permisos) {
                let ids = permisos[i].id; // recuperar solo el campo id
                arreglo.push(ids)
    
            }
            console.log(arreglo);
            $("#myMultipleSelect2").val(arreglo).trigger('change');
            $('#editarModal').modal('toggle');
        })


    }
</script>

<script>

$('#formEditar').submit(function(e){
    e.preventDefault();
    var id =  $('#idRole').val();
    var name =$('#nombreRole').val();
    var select2 =  $("#myMultipleSelect2").val();
    var _tokenE = $("input[name=_token]").val();

    $.ajax({
        url: 'Role/actualizar',
    type: 'PUT',
        data:{
            id:id,
            name:name,
            permissions:select2,
            _token:_tokenE
        },
        success:function(response){
        
            $('#sid' + response.id +' td:nth.child(1)').text(response.name);
            $('#sid' + response.id +' td:nth.child(2)').text(response.select2);
            $('#editarModal').modal('hide');
            

            
        }
    })
});
</script>
@endsection
