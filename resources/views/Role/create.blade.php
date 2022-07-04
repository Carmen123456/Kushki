@section('css')
<!-- Button trigger modal -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@endsection
<style>
    .mul-select{
        width:100%;
    }
</style>
<form action="{{url('/Role')}}" method="post">
    @csrf

    <label>Tipo usuario </label>
<input class="form-control" type="text" name="name" id="name">
    

    <label for="permissions" class="form-label">Permiso para asignar
    </label>
        <select style="width:100%;" class="mul-select" multiple="true" name="permissions[]" id="permissions"  selectpicker>
        @foreach ($permissions as $analista)
        <option value="{{$analista->id}}">
            {{$analista->name }}
        </option>
        @endforeach
    </select>
<br>
<br>
<input type="submit" value="Guardar datos">
</form>

@section('js')
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
@endsection
