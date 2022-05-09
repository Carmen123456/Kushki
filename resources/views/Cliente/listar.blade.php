    @extends('layouts.app', [
    'class' => '',
    'elementActive' => 'Activos'
])

 
@section('content')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
@endsection
<div class="content">
    
    <form action="{{route('Cliente.importar')}}" method="post" enctype="multipart/form-data">
        @csrf
        @if(Session::has('message'))
        <p> {{Session::get('message')}}</p>
        @endif
<input type="file" name="file">
<button>Importar Clientes</button>
    </form>
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title">Comercios</h4>
              </div>
              <div class="card-body">
                <br>
                  <div class="table-responsive">
                      <table  id="example" table-bordered class="table  table-hover">
                          <thead class=" text-primary">
                         
                              <tr>
                                  <th>Id Comercio</th>
                                  <th>Nombre Consola</th>
                                  <th>Nombre Zendesk</th>
                                  <th>Categoria</th>
                                  <th>País</th>
                                  <th>Status</th>
                                  <th>Ultima actualización por:</th>
                                  <th>Operaciones</th>
                              </tr>
                          </thead>
                          </thead>
                          <tbody>
                            @foreach ($datosCliente as $Cliente)
                            <tr>
                                <td>{{$Cliente->idComercio}}</td>
                                <td>{{$Cliente->nombreConsola}}</td>
                                <td>{{$Cliente->nombreZendesk}}</td>
                                <td>{{$Cliente->categria}}</td>
                                <td>{{$Cliente->pais}}</td>
                                <td>
                    @switch($Cliente->state)
                            @case(true)
                    <a href="{{route('Cliente.habilitar',$Cliente->idCliente)}}">Activo</a>
                             @break
                @case(false)
                <a href="{{route('Cliente.habilitar',$Cliente->idCliente)}}">Inactivo</a>
                @break
                    @endswitch
                </td>
                <td>{{ @$Cliente->usuario->name }}</td>
                                <td><a href ="{{route('Cliente.edit',$Cliente->idCliente)}}">Editar</a> 
                                <form action="{{url('/Cliente',$Cliente->idCliente)}}" method="post">
                                   @csrf
                                   {{method_field('DELETE')}} 
                                <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Eliminar">
                                </form>
                                @switch($Cliente->state)
                            @case(true)
                              @break
                              @case(false)
                              <a href="{{route('Cliente.Causa',$Cliente->idCliente)}}">Definir Causa</a>
                        @break
                    @endswitch
                         <a href ="{{route('Cliente.show',$Cliente->idCliente)}}">
                            Mostrar Detalles
                            </a></td>
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
