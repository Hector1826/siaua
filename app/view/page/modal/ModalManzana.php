<!---Modal para crear manzana-->
<div class="modal fade" id="modalManzana" role="dialog">
    <div class="modal-dialog modal-person">
        <div class="modal-content card card-primary shadow">
            <div class="modal-header card-header justify-content-center">
                <h4 class="modal-title font-weight-bold text-center justify-content-between">
                    <i class="fas fa-map"></i> Manzana
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formManzana" action="#" method="POST">
                <div class="modal-body card-body">
                    <input id="txt_idmanzana" name="txt_idmanzana" type="hidden">
                    <input id="operacion" name="operacion" type="hidden">
                    <div class="form-group">
                        <label for="txt_nombre_manzana">Nombre manzana:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                            </div>
                            <input type="text" id="txt_nombre_manzana" name="txt_nombre_manzana" class="form-control"
                                placeholder="Ingrese nombre de la manzana" maxlength="30" minlength="5" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="manzana_des">Descripción manzana:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                            </div>
                            <input type="text" id="manzana_des" name="manzana_des" class="form-control"
                                placeholder="Descripción " maxlength="150" minlength="5" required>
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
<!---Final de modal de crear manzanas-->