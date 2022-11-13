<div class="modal fade" id="modalServicioPersona" role="dialog">
    <div class="modal-dialog modal-person">
        <div class="modal-content card card-primary shadow">
            <div class="modal-header card-header justify-content-center">
                <i class="fas fa-hand-holding-droplet fa-1x mt-2 mr-2"></i>
                <h4 class="modal-title"> Registro [Servicio - Persona] </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formServicioPersona" action="#" method="POST" autocomplete="off">
                <div class="modal-body card-body">
                        <div class="form-group">
                            <label class="form-label" for="desc_servicio">* Descripción del servicio:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                </div>
                                <input name="desc_servicio" id="desc_servicio" class="form-control" placeholder="Descripción"
                                    required>
                            </div>
                        </div>
                    <div class="form-row">
                        <div class="form-group d-flex mb-0">
                            <div class="form-group col-md-4 mr-2">
                                <label class="form-label" for="id_folio">* Folio:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                    </div>
                                    <input name="id_folio" id="id_folio" class="form-control" placeholder="N° de Folio"
                                        required>
                                </div>
                            </div>
                            <div class="form-group col-md-4 mr-2">
                                <label class="form-label" for="manzana">* Manzana:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-shapes"></i></span>
                                    </div>
                                    <select name="manzana" id="manzana"
                                        class="form-control selectpicker" data-live-search="true" required=""></select>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label" for="id_tipo_via">* Tipo via:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-shapes"></i></span>
                                    </div>
                                    <select name="id_tipo_via" id="id_tipo_via" class="form-control selectpicker"
                                        data-live-search="true" required="">
                                        <option selected="selected">- Selecciona -</option>
                                        <option value="Avenida">Avenida</option>
                                        <option value="Calle">Calle</option>
                                        <option value="Cerrada">Cerrada</option>
                                        <option value="Callejón">Callejón</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group d-flex mb-0">
                            <div class="form-group col-md-8 mr-2">
                                <label class="form-label" for="id_direccion">* Dirección:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-road"></i></span>
                                    </div>
                                    <input type="text" id="id_direccion" name="id_direccion" class="form-control"
                                        placeholder="Nombre de la calle" required>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label" for="id_numero">N°:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                    </div>
                                    <input type="text" id="id_numero" name="id_numero" class="form-control"
                                        placeholder="Número">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="form-group d-flex mb-0">
                            <div class="form-group col-md-8">
                                <label for="id_nombre_persona">* Nombre:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="id_nombre_persona" id="id_nombre_persona"
                                        class="form-control" placeholder="Nombre" required>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="id_edo_civil">* Edo. civil:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <select name="id_edo_civil" id="id_edo_civil" class="form-control selectpicker"
                                        data-live-search="true" required=""></select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-flex mb-0">
                        <div class="form-group mr-2">
                            <label class="form-label" for="id_apepat">* Apellido paterno:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" id="id_apepat" name="id_apepat" class="form-control"
                                    placeholder="Apellido Paterno" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="id_apemat">* Apellido materno:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" id="id_apemat" name="id_apemat" class="form-control"
                                    placeholder="Apellido Materno" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                </div>
            </form> 
        </div>
    </div>
</div>
