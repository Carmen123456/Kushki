@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'asignados'
])

 
@section('content')
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


    <a class="btn btn-success"  href="{{route('Asignacion.create')}}">Nuevo</a>
 
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Asignados Enterprise</h4>
                </div>
                <div class="card-body">
                  <br>
                    <div class="table-responsive">
                        <table  id="example" table-bordered class="table  table-hover">
                            <thead class=" text-primary">
        <tr>
                <th>Id</th>
                <th>Analista</th>
                <th>Comercio</th>
                <th>Kam</th>
                <th>Categoria</th>

                <th>Operaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datosAsignacion as $datosAsignacion)
            <tr>
                <td>{{$datosAsignacion->idAsignacion }}</td>
                <td>{{$datosAsignacion->usuario->name}}</td>
                <td>{{$datosAsignacion->cliente->nombreConsola}}</td>
                <td>{{$datosAsignacion->Kam}}</td>
                <td>{{$datosAsignacion->categoria}}</td>
                <td><a href ="{{route('Asignacion.edit',$datosAsignacion->idAsignacion)}}">Editar</a> 
                <form action="{{url('/Asignacion',$datosAsignacion->idAsignacion)}}" method="post">
                   @csrf
                   {{method_field('DELETE')}} 
                <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Eliminar">
                </form>
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
} );
</script>
 @endsection
@endsection
