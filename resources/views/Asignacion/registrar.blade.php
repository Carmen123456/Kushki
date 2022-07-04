<form id="miForm" method="post" action="{{ url('/Asignacion') }}">
    @csrf
    <div class="mt-4">
        <label for="usuarios" class="form-label">Analista
        </label>
        <select name="usuarios" id="usuarios" class="form-control">
            @foreach ($usuarios as $analista)
                <option value="{{ $analista->id }}">
                    {{ $analista->name }}
                </option>
            @endforeach

        </select>
    </div>

    <div class="mt-4">
        <label for="usuarios" class="form-label">Comercio

        </label>
        <select name="Clientes" id="Clientes" class="form-control">
            @foreach ($Clientes as $Comercio)
                <option value="{{ $Comercio->idCliente }}">
                    {{ $Comercio->nombreConsola }}
                </option>
            @endforeach

        </select>

    </div>

    <div class="mt-4">
        <label for="Kam" class="form-label">KAM:</label>
        <input type="text" class="form-control" id="Kam" name="Kam">

    </div>

    <div class="mt-4">
        <label for="categoria" class="form-label">Categoria:</label>
        <input style="background: white;" readonly value="Enterprise" type="text" class="form-control" id="categoria"
            name="categoria">

    </div>

    <div class="mt-4">
        <input type="submit" value="Guardar datos">
    </div>
</form>
