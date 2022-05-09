@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'macrosB2C'
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


    <a class="btn btn-success"  href="{{route('MacrosIntercom.create')}}">Nuevo</a>
    
    <form action="{{route('MacrosIntercom.create')}}" method="post" enctype="multipart/form-data">
        @csrf
        @if(Session::has('message'))
        <p> {{Session::get('message')}}</p>
        @endif
<input type="file" name="file">
<button>Importar macros</button>
    </form>
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Macros Intercom</h4>
                </div>
                <div class="card-body">
                  <br>
                    <div class="table-responsive">
                        <table  id="example" table-bordered class="table  table-hover">
                            <thead class=" text-primary">
                <tr>
                <th>Id</th>
                <th>Categoria</th>
                <th>Mensaje</th>
                <th>Grupo</th>
                <th>Ultima actualización por:</th>
                <th>Operaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datosIntercom as $MacrosIntercom)
            <tr>
                <td>{{$MacrosIntercom->idMacroIntercom}}</td>
                <td>{{$MacrosIntercom->categoria}}</td>
                <td><a href="#PlaceModal-{{$MacrosIntercom->idMacroIntercom}}" data-toggle="modal">  <p style="text-overflow: ellipsis; width: 350px;
                    padding: 2px 5px;   white-space: nowrap;
      overflow: hidden;">{{$MacrosIntercom->mensaje}} </p></a>
         <!-- Modal -->
  <div  class="modal fade"  tabindex="-1" id="PlaceModal-{{$MacrosIntercom->idMacroIntercom}}"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Respuesta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" >
          
        <p style="width: 450px;" id="textArea">{{$MacrosIntercom->mensaje}}</p>
     
      <button id="btn" onclick="copyToClickBoard()">Copy</button>

    
        </div>
      </div>
    </div>
  </div>  
    </td>
                <td>
    @switch($MacrosIntercom->grupo)
            @case(true)
            <a href="{{route('MacrosIntercom.cambiar',$MacrosIntercom->idMacroIntercom)}}">B2B</a>
             @break
@case(false)
<a href="{{route('MacrosIntercom.cambiar',$MacrosIntercom->idMacroIntercom)}}">B2C</a>
@break
    @endswitch
</td>
<td>{{$MacrosIntercom->usuario->name}}</td>
                <td><a href ="{{route('MacrosIntercom.edit',$MacrosIntercom->idMacroIntercom)}}">Editar</a> 
                <form action="{{url('/MacrosIntercom',$MacrosIntercom->idMacroIntercom)}}" method="post">
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


function copyToClickBoard(){
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
