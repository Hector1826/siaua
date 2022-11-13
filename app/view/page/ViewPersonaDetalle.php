<div class="row">
    <div class="col-md-4">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle bg-cyan" src="public/assets/img/img_person_blue_2.png" alt="Perfil de usuario">
                </div>
                <input type="hidden" id="id_persona">

                <h3 id="txt_nombre" class="profile-username text-center">---</h3>
                <p id="txt_ape" class="text-muted text-center ml-3">---</p>
                
                <hr class="m-0 p-0">

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Dirección: </strong>
                <p class="text-muted ml-3" id="txt_direccion"></p>

                <hr class="m-0 p-0">

                <strong><i class="fas fa-street-view mr-1"></i> Manzana: </strong>
                <p class="text-muted ml-3" id="txt_manzana"></p>

                <hr class="m-0 p-0">

                <strong><i class="fas fa-gavel mr-1"></i> Estado civil:</strong>
                <p class="text-muted ml-3" id="txt_edo_civil"></p>
                <hr class="m-0 p-0">
                <strong><i class="fas fa-circle mr-1"></i> Estatus persona</strong>

                <p class="text-muted text-success text-bold ml-3" id="txt_status_persona"></p>

                <a href="#" class="btn btn-primary btn-block" id="open_modal_persona"><b>Editar</b></a>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->


    </div>
    <!-- /.col -->
    <div class="col-md-8">
        <div class="card card-info">
            <div class="card-body row" id="item_servicio">
           </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<?php include_once("modal/ModalPersona.php"); ?>
<?php include_once("modal/ModalTarjeta.php"); ?>
<?php include_once("modal/ModalPagoServicio.php"); ?>
<!-- /.row -->
<script type="text/javascript" src="app/view/scripts/personaDetalle.js"></script>