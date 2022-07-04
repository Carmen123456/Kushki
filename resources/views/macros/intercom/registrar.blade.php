    <form id="miFormCrear" method="post" action="{{ url('/MacrosIntercom') }}">
        @csrf
        <br>
        <div class="form-group">
            <label for="">Mensaje</label>
            <textarea class="form-control" type="textarea" name="mensaje" id="mensaje"></textarea>
        </div>
        <br>
        <br>
        <div class="form-group">
            <label for="">Categoria</label>
            <input class="form-control" type="text" name="categoria" id="categoria">
        </div>
        <br>
        <br>
        <label for="">Grupo</label>
        <select class="form-control" name="grupo" id="grupo">
            <option value="1">B2B</option>
            <option value="0">B2C</option>
        </select>
        <br>
        <br><br>
        <input type="submit" value="Guardar datos">

    </form>
