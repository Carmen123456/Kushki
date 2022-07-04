
        <form id="miFormCausa" action="{{ url('/Causas/'.$Causa->idCausa)}}" method="post" autocomplete="off">
            @csrf
            {{ method_field('PATCH') }}
            <br>
            <br>
            <label for="">Motivo</label>
            <input  class="form-control" type="text" name="motivo" id="motivo" value="{{ $Causa->motivo }}">
            <br>
            <br>
            <label for="">Fecha</label>
            <input  class="form-control" type="text" name="fecha" id="fecha" value="{{ $Causa->fecha }}">
            <br>
            <br>
            <label for="">Agente</label>
            <input  class="form-control" type="text" name="nombreAgente" id="nombreAgente" value="{{ $Causa->nombreAgente }}">
            <br>
            <br>
            <label for="">Tickets</label>
            <input  class="form-control" type="text" name="ticket" id="ticket" value="{{ $Causa->ticket }}">
            <br>
            <br>
            <input  class="form-control" type="hidden" name="idClienteFK" id="idClienteFK" value="{{ $Causa->idClienteFK }}">
            <input  class="form-control" type="submit" value="Guardar datos">
        </form>
    </div>

