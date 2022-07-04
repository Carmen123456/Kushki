        <form id="miFormCausaCrear" action="{{ url('/Causas/') }}" method="post" autocomplete="off">
            @csrf

                <label for="">Motivo</label>
                <input  class="form-control" type="text" name="motivo" id="motivo" value="Sin Motivo">
                <br>
                <br>
                <label for="">Fecha</label>
                <input  class="form-control" type="text" name="fecha" id="fecha" value="Sin fecha">
                <br>
                <br>
                <label for="">Agente</label>
                <input  class="form-control" type="text" name="nombreAgente" id="nombreAgente" value="Sin agente">
                <br>
                <br>
                <label for="">Tickets</label>
                <input  class="form-control" type="text" name="ticket" id="ticket" value="Sin Ticket">
                <br>
                <br>
                <input  class="form-control" type="hidden" name="idClienteFK" id="idClienteFK" value="{{ $Cliente->idCliente }}">
      <button type="submit">Enviar</button> 
        </form>
    </div>
