
<!-- Button trigger modal -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

<style>
    .mul-select{
        width:100%;
    }
</style>
  
  <form   id="formEditar" >
        @csrf
        <label>Tipo usuario </label>
        <div class="form-group">
      <input  class="form-control" type="hidden" name="id"  id="idRole">
        <input  class="form-control" type="text" name="nombreRole"  id="nombreRole">
        </div>
        <select style="width:100%;" class="mul-select" id="myMultipleSelect2" multiple="" name="myMultipleSelect2[]" selectpicker>
            @foreach ($permissions as $analista)
            <option value="{{$analista->id}}" >
                {{$analista->name }} 
            </option>
            @endforeach
        </select>
    
        <input type="submit" id="actualizar" value="Guardar datos">
    </form>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    
    <script>
    $(document).ready(function() {
    $(".mul-select").select2({
                    tags: true,
                    tokenSeparators: ['/',',',';'," "] 
                });
    } );
    
    </script>
  