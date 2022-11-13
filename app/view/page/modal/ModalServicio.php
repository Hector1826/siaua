<div class="modal fade" id="modalServicio" role="dialog">
    <div class="modal-dialog modal-person">
        <div class="modal-content card card-primary shadow">
            <div class="modal-header card-header justify-content-center">
                <i class="fas fa-hand-holding-droplet fa-1x mt-2 mr-2"></i>
                <h4 class="modal-title"> Registro [Servicio] </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="formServicio" action="#" method="POST" autocomplete="off">
                <div class="modal-body card-body">
                    <input type="hidden" id="id_persona" name="id_persona">
                    <div class="form-group d-flex justify-content-between mb-0">

                        <div class="form-group">
                            <label class="form-label float-lg-right" for="id_folio">* Folio servicio:</label>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-shapes"></i></span>
                                </div>
                                <input type="text" id="id_folio" name="id_folio" class="form-control" required>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="form-label" for="nombre_persona"> Persona: </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" id="nombre_persona" name="nombre_persona" class="form-control" required>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group d-flex justify-content-between mb-0">

                        <div class="form-group mr-2">
                            <label class="form-label" for="id_manzana_modal">* Manzana:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-shapes"></i></span>
                                </div>
                                <select name="id_manzana_modal" id="id_manzana_modal" class="form-control selectpicker"
                                    data-live-search="true" required=""></select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="id_tipo_via_n">* Tipo via:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-shapes"></i></span>
                                </div>
                                <select name="id_tipo_via_n" id="id_tipo_via_n" class="form-control selectpicker"
                                    data-live-search="true" required="">
                                    <option selected="selected">- Selecciona -</option>
                                    <option value="Avenida">Avenida</option>
                                    <option value="Calle">Calle</option>
                                    <option value="Cerrada">Cerrada</option>
                                    <option value="Callejón">Callejón</option>
                                </select>
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
                    <div class="form-group">
                        <label class="form-label" for="servicio_info"> * Descripción[Lugar del servicio]: </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-periscope"></i></span>
                            </div>
                            <input type="text" id="servicio_info" name="servicio_info" class="form-control"
                                placeholder="Descripción sobre lugar del servicio" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

            </form>
        </div>
    </div>
</div>