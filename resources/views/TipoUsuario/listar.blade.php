
    @extends('layouts.app', [
        'class' => '',
        'elementActive' => 'tipo'
    ])
    
    @section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    @section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    @endsection
    <a class="btn btn-info"  href="{{route('TipoUsuario.create')}}">Nuevo</a>
    <br>
    <table  id="example" table-bordered class="table table-striped mt-4" style=" width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tipo Usuario</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datosTipoUsuario as $TipoUsuario)
            <tr>
                <td>{{$TipoUsuario->idTipoUsuario}}</td>
                <td>{{$TipoUsuario->tipoUsuario}}</td>
                <td>
    @switch($TipoUsuario->estado)
            @case(true)
            <a href="{{route('TipoUsuario.habilitar',$TipoUsuario->idTipoUsuario)}}">
               Activo
        </a>

            @break
@case(false)

<a href="{{route('TipoUsuario.habilitar',$TipoUsuario->idTipoUsuario)}}">
   Inactivo
</a>
@break
    @endswitch

</td>

                <td><a href ="{{route('TipoUsuario.edit',$TipoUsuario->idTipoUsuario)}}">Editar</a> 
                <form action="{{url('/TipoUsuario',$TipoUsuario->idTipoUsuario)}}" method="post">
                   @csrf
                   {{method_field('DELETE')}} 
                <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Eliminar">
    
                </form>
            
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @section('js')
   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
   <script>

$(document).ready(function() {
    $('#example').DataTable();
} );
   </script>
    @endsection
    @endsection
