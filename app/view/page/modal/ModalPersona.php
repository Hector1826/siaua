<div class="modal fade" id="modalPersona" role="dialog">
    <div class="modal-dialog modal-person">
        <div class="modal-content card card-primary shadow">
            <div class="modal-header card-header justify-content-center">
                <i class="fas fa-hand-holding-droplet fa-1x mt-2 mr-2"></i>
                <h4 class="modal-title"> Persona [Edición] </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formPersona" action="#" method="POST" autocomplete="off">
                <div class="modal-body card-body">
                    <input id="id_persona" name="id_persona" type="hidden">
                    <div class="form-group">
                        <label for="id_nombre_persona">Nombre:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" id="id_nombre_persona" name="id_nombre_persona" class="form-control"
                                placeholder="Ingrese nombre" required>
                        </div>
                    </div>

                    <div class="form-group d-flex mb-0">
                        <div class="form-group mr-2">
                            <label for="id_apepat">Apellido paterno:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" id="id_apepat" name="id_apepat" class="form-control"
                                    placeholder="Apellido Paterno" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_apemat">Apellido materno:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" id="id_apemat" name="id_apemat" class="form-control"
                                    placeholder="Apellido Materno" required>
                            </div>
                        </div>
                    </div>
                    <hr class="bg-warning">
                    <div class="form-group">
                        <p><b> NOTA:</b>
                            Al modifcar esta dirección estara modificando la del servicio que esta asociado
                            a la misma.</p>
                    </div>
                    <hr class="bg-warning">
                    <div class="form-group">
                        <label for="id_direccion">Dirección:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-road"></i></span>
                            </div>
                            <input type="text" id="id_direccion" name="id_direccion" class="form-control"
                                placeholder="Dirección" required>
                        </div>
                    </div>

                    <div class="form-group d-flex">
                        <div class="form-group mr-2">
                            <label for="manzana">Manzana:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-shapes"></i></span>
                                </div>
                                <select name="manzana" id="manzana" class="form-control selectpicker"
                                    data-live-search="true" required="" size="4">
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_edo_civil">Estado civil:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-id-badge"></i></span>
                                </div>
                                <select name="id_edo_civil" id="id_edo_civil" class="form-control selectpicker"
                                    data-live-search="true" required size="4"></select>
                            </div>
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