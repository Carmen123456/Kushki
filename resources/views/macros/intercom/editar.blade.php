

    
    <form id="miFormEditar" action="{{ url('/MacrosIntercom/' .  $MacrosIntercom->idMacroIntercom) }}" method="post">
        @csrf
        {{ method_field('PATCH') }}


        <br>
        <label for="">Mensaje</label>
      
        <textarea size=40 style="height:300px;" class="form-control" type="text" name="mensaje">{{ $MacrosIntercom->mensaje }}</textarea>
        <br>
        <br>
        <label for="">Categoria</label>
        <input class="form-control" type="text" name="categoria" id="categoria" value="{{$MacrosIntercom->categoria }}">
        <br>
        <br>
        <input type="submit" value="Guardar datos">

    </form>


