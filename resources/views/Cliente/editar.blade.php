<form id="miFormEdiar" action="{{ url('/Cliente/' . $Cliente->idCliente) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}

    <h6>Información detallada y clasificación comercio</h6>
    <div class="row">
        <div class="col">
            <label for="">Id Comercio</label>
            <input class="form-control" maxlength="100" type="text" required="required" type="number" name="idComercio"
                id="idComercio" value="{{ $Cliente->idComercio }}">
        </div>
        <div class="col">
            <label for="">Tax id</label>
            <input class="form-control" maxlength="100" type="text" required="required" type="text" name="taxId"
                id="taxId" value="{{ $Cliente->taxId }}">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="">Nombre/Razón social</label>
            <input class="form-control" maxlength="100" type="text" required="required" type="text"
                name="nombreRazon" id="nombreRazon" value="{{ $Cliente->nombreRazon }}">
        </div>
        <div class="col">
            <label for="">Nombre consola</label>
            <input class="form-control" maxlength="100" type="text" required="required" type="text"
                name="nombreConsola" id="nombreConsola" value="{{ $Cliente->nombreConsola }}">
        </div>
    </div>
    <div class="form-group">
        <label for="">Nombre Zendesk</label>
        <input class="form-control" maxlength="100" type="text" required="required" type="text"
            name="nombreZendesk" id="nombreZendesk" value="{{ $Cliente->nombreZendesk }}">
    </div>
    <div class="row">
        <div class="col">
            <label for="">Categoria</label>
            <select required="required" name="categria" id="categria" class="form-control">
                <option value="Enterprise" @if ($Cliente->categria == 'Enterprise') selected @endif>
                    Enterprise
                </option>
                <option value="Medium" @if ($Cliente->categria == 'Medium') selected @endif>Medium</option>

                <option value="Small" @if ($Cliente->categria == 'Small') selected @endif>Small</option>
            </select>
        </div>
        <div class="col">
            <label for="">Pais</label>
            <select required="required" name="pais" id="pais" class="form-control">
                <option value="Colombia" @if ($Cliente->pais == 'Colombia') selected @endif>
                    Colombia
                </option>
                <option value="México" @if ($Cliente->pais == 'México') selected @endif>México</option>

                <option value="Perú" @if ($Cliente->pais == 'Perú') selected @endif>Perú</option>
                <option value="Ecuador" @if ($Cliente->pais == 'Ecuador') selected @endif>Ecuador</option>

                <option value="Chile" @if ($Cliente->pais == 'Chile') selected @endif>Chile</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="">Nombre contacto</label>
            <input maxlength="100" type="text" required="required" class="form-control" type="text"
                name="nombreContacto" id="nombreContacto" value="{{ $Cliente->nombreContacto }}">
        </div>
        <div class="col">
            <label for="">Email</label>
            <input class="form-control" type="email" name="emailContacto" id="emailContacto"
                value="{{ $Cliente->emailContacto }}">
        </div>
    </div>
    <div class="form-group">
        <label for="">Merchant Url</label>
        <input maxlength="100" type="text" required="required" class="form-control" type="text"
            name="merchanturl" id="merchanturl" value="{{ $Cliente->merchanturl }}">
    </div>

    <h6>Datos contacto a comercio por intermitencias</h6>
    <div class="row">
        <div class="col">
            <label for="">Nombre</label>
            <input maxlength="100" type="text" required="required" class="form-control" type="text"
                name="personaContacto" id="personaContacto " value="{{ $Cliente->personaContacto }}">
        </div>
        <div class="col">
            <label for="">Email</label>
            <input maxlength="100" type="text" required="required" class="form-control" type="text"
                name="personaEmmail" id="personaEmmail" value="{{ $Cliente->personaEmmail }}">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="">Tipo contacto</label>
            <select maxlength="100" type="text" required="required" class="form-control" name="tipoContacto"
                id="tipoContacto"value="{{ $Cliente->tipoContacto }}">
                <option value="1" @if ($Cliente->tipoContacto == '1') selected @endif>Mail</option>
                <option value="0"@if ($Cliente->tipoContacto == '0') selected @endif>Slack</option>
                <option value=null @if ($Cliente->tipoContacto == null) selected @endif>Sin tipo contacto</option>
            </select>
        </div>

        <div class="col">
            <label for="">Telefono</label>
            <input maxlength="100" type="text" required="required" class="form-control" type="text"
                name="telefonoWeb" id="telefonoWeb" value="{{ $Cliente->telefonoWeb }}">
        </div>
    </div>
    <h6>Canal de contacto usuarios finales</h6>
    <div class="row">
        <div class="col">
            <label for="">Email</label>
            <input maxlength="100" type="text" required="required" class="form-control" type="text"
                name="emailWeb" id="emailWeb" value="{{ $Cliente->emailWeb }}">
        </div>


        <div class="col">
            <label for="">Chat web</label>
            <select maxlength="100" type="text" required="required" class="form-control" name="chatWeb"
                id="chatWeb" value="{{ $Cliente->chatWeb }}">
                <option value="1" @if ($Cliente->chatWeb == '1') selected @endif>Sí aplica</option>
                <option value="0" @if ($Cliente->chatWeb == '0') selected @endif>No aplica</option>
            </select>
        </div>
    </div>
    <br><br>
    <div class="col-md-12">
        <input class="nextBtn pull-right" type="submit" value="Guardar datos">
    </div>


</form>
