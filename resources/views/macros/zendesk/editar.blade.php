    <form id="miFormEditar" action="{{ url('/MacrosZendesk/' . $MacrosZendesk->idMacroZendesk) }}" method="post">
        @csrf
        {{ method_field('PATCH') }}
        <br>
        <div class="form-group">
            <label for="">Respuesta</label>
            <textarea size=40 style="height:300px;" class="form-control" type="text" name="respuesta" id="respuesta">{{ $MacrosZendesk->respuesta }}</textarea>
        </div>
        <br>
        <br>
        <div class="form-group">
            <label for="">Nombre plantilla</label>
            <input class="form-control" type="text" name="nombrePlantilla" id="nombrePlantilla"
                value="{{ $MacrosZendesk->nombrePlantilla }}">
        </div>
        <br>
        <br>
        <div class="form-group">
            <label for="">Aplicativo</label>
            <input class="form-control" type="text" name="aplicativo" id="aplicativo"
                value="{{ $MacrosZendesk->aplicativo }}">
        </div>
        <br>
        <br>
        <div class="form-group">
            <label for="">fecha Actualizacion</label>
            <input class="form-control" type="text" name="fechaActualizacion" id="fechaActualizacion"
                value="{{ $MacrosZendesk->fechaActualizacion }}">
        </div>
        <br>
        <br>
        <input type="submit" value="Guardar datos">

    </form>