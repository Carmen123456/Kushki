@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'inactivos'
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
<div class="content">
 

    <form action="{{route('Causa.importarCausa')}}" method="post" enctype="multipart/form-data">
        @csrf
        @if(Session::has('message'))
        <p> {{Session::get('message')}}</p>
        @endif
<input type="file" name="file">
<button>Importar Causa</button>
    </form>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Clientes inactivos con causa</h4>
                    </div>
                    <div class="card-body">
                      <br>
                        <div class="table-responsive">
                            <table id="example" table-bordered class="table  table-hover">
                                <thead class=" text-primary">
            <tr>
                <th>Id Comercio</th>
                <th>Nombre Consola</th>
                <th>Motivo</th>
                <th>Fecha</th>
                <th>Nombre Agente</th>
                <th>Ticket</th>
                <th>Operaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datosCausa as $Causa)
            <tr>
                <td>{{$Causa->cliente->idComercio}}</td>
                <td>{{$Causa->cliente->nombreConsola}}</td>
                <td>{{$Causa->motivo}}</td>
                <td>{{$Causa->fecha}}</td>
                <td>{{$Causa->nombreAgente}}</td>
                <td>{{$Causa->ticket}}</td>
                <td><a href ="{{route('Causas.edit',$Causa->idCausa)}}">Editar Motivo</a><br>
                    <a href ="{{route('Causas.show',$Causa->idCausa)}}">ver detalles</a>
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
      
