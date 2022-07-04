<div class="row">
    <form id="miFormCrear" method="post" action="{{ url('/MacrosZendesk') }}">
        @csrf
        <br>
        <div class="form-group">
            <label for="">Nombre plantilla</label>
            <input class="form-control" type="text" name="nombrePlantilla" id="nombrePlantilla">
        </div>
        <br>
        <div class="row">
            <div class="col">
                <label for="">Nombre aplicativo</label>
                <input class="form-control" type="text" name="aplicativo" id="aplicativo">
            </div>
            <div class="col">
                <label for="">Fecha actualización</label>
                <input class="form-control" type="text" name="fechaActualizacion" id="fechaActualizacion">
            </div>
        </div>
        <br>
        <label for="">Grupo</label>
        <select class="form-control" name="grupo" id="grupo">
            <option value="1">B2B</option>
            <option value="0">B2C</option>
        </select>
        <br>
        <br>
        <div class="form-group">
            <label for="">Respuesta</label>
            <textarea class="form-control" type="textarea" name="respuesta" id="respuesta"></textarea>
        </div>
        <br>
        <input type="submit" value="Guardar datos">

    </form>
</div>
