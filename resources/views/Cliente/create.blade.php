
    <form id="miForm" method="post" action="{{ url('/Cliente') }}">
        @csrf
       
                    <h6>Información detallada y clasificación comercio</h6>
                    <div class="row">
                        <div class="col">
                        <label for="">Id Comercio</label>
                        <input class="form-control" maxlength="100" type="text" required="required" type="number"
                            name="idComercio" id="idComercio">
                    </div>
                    <div class="col">
                        <label for="">Tax id</label>
                        <input class="form-control" maxlength="100" type="text" required="required" type="text"
                            name="taxId" id="taxId">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">Nombre/Razón social</label>
                        <input class="form-control" maxlength="100" type="text" required="required" type="text"
                            name="nombreRazon" id="nombreRazon">
                    </div>
                    <div class="col">
                        <label for="">Nombre consola</label>
                        <input class="form-control" maxlength="100" type="text" required="required" type="text"
                            name="nombreConsola" id="nombreConsola">
                    </div>
                </div>
                    <div class="form-group">
                        <label for="">Nombre Zendesk</label>
                        <input class="form-control" maxlength="100" type="text" required="required" type="text"
                            name="nombreZendesk" id="nombreZendesk">
                    </div>

                    <div class="row">
                        <div class="col">
                        <label for="">Categoria</label>
                        <select maxlength="100" type="text" required="required" class="form-control" name="categria"
                            id="categria">
                            <option value="Enterprise">Enterprise</option>
                            <option value="Medium">Medium</option>
                            <option value="Small">Small</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="">Pais</label>
                        <select maxlength="100" type="text" required="required" class="form-control" name="pais"
                            id="pais">
                            <option value="Colombia">Colombia</option>
                            <option value="México">México</option>
                            <option value="Perú">Perú</option>
                            <option value="Ecuador">Ecuador</option>
                        </select>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <label for="">Nombre contacto</label>
                        <input maxlength="100" type="text" required="required" class="form-control" type="text"
                            name="nombreContacto" id="nombreContacto">
                    </div>
                    <div class="col">
                        <label for="">Email</label>
                        <input class="form-control" type="email" name="emailContacto" id="emailContacto">
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="">Merchant Url</label>
                        <input maxlength="100" type="text" required="required" class="form-control" type="text"
                            name="merchanturl" id="merchanturl">
                    </div>
     
                <h6>Datos contacto a comercio por intermitencias</h6>
                <div class="row">
                    <div class="col">
                        <label for="">Nombre</label>
                        <input maxlength="100" type="text" required="required" class="form-control" type="text"
                            name="personaContacto" id="personaContacto ">
                    </div>
                    <div class="col">
                        <label for="">Email</label>
                        <input maxlength="100" type="text" required="required" class="form-control" type="text"
                            name="personaEmmail" id="personaEmmail">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">Tipo contacto</label>
                        <select maxlength="100" type="text" required="required" class="form-control"
                            name="tipoContacto" id="tipoContacto">
                            <option value="1">Mail</option>
                            <option value="0">Slack</option>
                            <option value=null>Sin tipo contacto</option>
                        </select>
                    </div>

                    <div class="col">
                        <label for="">Telefono</label>
                        <input maxlength="100" type="text" required="required" class="form-control" type="text"
                            name="telefonoWeb" id="telefonoWeb">
                    </div>
                </div>
                <h6>Canal de contacto usuarios finales</h6>
                <div class="row">
                    <div class="col">
                    <label for="">Email</label>
                    <input maxlength="100" type="text" required="required" class="form-control" type="text"
                        name="emailWeb" id="emailWeb">
                </div>


                <div class="col">
                    <label for="">Chat web</label>
                    <select maxlength="100" type="text" required="required" class="form-control" name="chatWeb"
                        id="chatWeb">
                        <option value="1">Si aplica</option>
                        <option value="0">No aplica</option>
                    </select>
                </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <input class="nextBtn pull-right" type="submit" value="Guardar datos">
                </div>
            
    </form>



