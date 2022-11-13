<div class="card card-primary card-outline">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <label for="id_manzana">Manzana:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map"></i></span>
                    </div>
                    <select name="id_manzana" id="id_manzana" class="form-control selectpicker"
                        data-live-search="true" required="">
                    </select>
                </div>
            </div>
        </div>
        <!-- <table id="tb_agua" class="table table-sm table-striped table-bordered text-center compact">-->
            <hr>
        <table id="tb_agua" class="table table-sm table-striped table-bordered text-center">
            <thead class="table-primary">
                <tr>
                    <th> # </th>
                    <th> Persona </th>
                    <th> Manzana </th>
                    <th> Servicios </th>
                    <th> Opciones </th>
                </tr>
            </thead>
            <tbody class="table-primary table-light"></tbody>
        </table>
    </div>

</div>
<!--======================== -->
<!-- Archivos de los modales -->
<!--========================= -->
<?php include_once("modal/ModalServicio.php"); ?>
<?php include_once("modal/ModalPersonaServicio.php"); ?>


<script type="text/javascript" src="app/view/scripts/persona_servicio.js"></script>
