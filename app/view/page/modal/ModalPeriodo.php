<!---Modal para crear Ciclo-->
<div class="modal fade" id="modalPeriodo" role="dialog">
    <div class="modal-dialog modal-person">
        <div class="modal-content card card-primary shadow">
            <div class="modal-header card-header justify-content-center">
                <h4 class="modal-title font-weight-bold text-center justify-content-between">
                    <i class="fas fa-calendar-days fa-1x mt-2 mr-2"></i>Peridodo [Tiempo] 
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
        <form id="formPeriodo" action="#" method="POST">
            <div class="modal-body card-body">
                <input id="id_periodo" name="id_periodo" type="hidden">
                <div class="form-group">
                    <label for="periodo_info">Nombre :</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" id="periodo_info" name="periodo_info" class="form-control"
                            placeholder="Ingrese nombre" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="periodo_inicia">Inico:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fas fa-calendar"></i></span>
                        </div>
                        <input type="date" id="periodo_inicia" name="periodo_inicia" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="periodo_termina">Termina:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="date" id="periodo_termina" name="periodo_termina" class="form-control" required>
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

<!---Final de modal de crear cilcos-->
