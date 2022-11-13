<?php 
require_once("../model/ModelServicio.php");
require_once("../model/ModelServicioDireccion.php");
// Validamos si existe el parametro el cual su valor indica que vamos a realizar.
if(isset($_GET['ACTN'])){

    $serviceObj = new ModelServicio();
    $serviceDirecObj = new ModelServicioDireccion();

    $id_servicio = isset($_POST['id_servicio']) ? $_POST['id_servicio'] : "";
    $folio = isset($_POST['id_folio']) ? $_POST['id_folio'] : "";
    $desc_servicio = isset($_POST['servicio_info']) ? $_POST['servicio_info'] : "";
    $fecha_registro = date('Y-m-d');
    $status = 1;
    $direc_actual = 1;
    $id_rspt_persona = isset($_POST['id_persona']) ? $_POST['id_persona'] : "";
    $idTipoVia =  isset($_POST['id_tipo_via_n']) ? $_POST['id_tipo_via_n'] : "";
    $direccion =  isset($_POST['id_direccion']) ? $_POST['id_direccion'] : "";
    $numeroCalle =  isset($_POST['id_numero']) ? $_POST['id_numero'] : "";
    $manzana =  isset($_POST['id_manzana_modal']) ? $_POST['id_manzana_modal'] : "";
    switch($_GET['ACTN']){
        case "ADD_SERVICIO_PERSONA": # Registra servicio a persona existente
            $direc_actual = 0;
            $id_rspta_servicio = $serviceObj->insertServicioPersona($folio,$desc_servicio,$fecha_registro,null,$direc_actual,$id_rspt_persona);
            # Relaiza registro en servicio_dirección y se obtiene el ID Autoincrementable que se asigno a dicho registro
            $rspta = $serviceDirecObj->insertServicioDireccion($idTipoVia,$direccion,$numeroCalle,$manzana, $id_rspta_servicio);
            echo $rspta ? INSERT_SUCCESS : RSPTA_FAIL;
            break;
        case "NUMERO_SERVICIOS_PERSONA":
            $rspta = $serviceObj->countService($id_rspt_persona);
            echo $rspta ? json_encode($rspta) : RSPTA_FAIL;
            break;
        case "LIST_SERVICIO_PERSONA":
            $rspta = $serviceObj->getServicioPersona($id_rspt_persona);
            $targeta = "";

            while($reg = $rspta->fetch_object()){
                $targeta.= '<div class="col-12 col-sm-6 col-md-4 d-flex">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0" id="item_servicio_info"> <i class="fas fa-barcode"></i> '.$reg->servicio_folio.' '.$reg->servicio_info.' </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-md-9">
                                <h2 class="lead"><b id="manzana_item"></b></h2>
                                <p class="text-muted text-sm" id="servicio_direccion"></p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small">
                                        <span class="fa-li">
                                            <i class="fas fa-lg fa-building"></i>
                                        </span>
                                        '.$reg->manzana_nombre.' - '.$reg->calle.'</li>

                                </ul>
                            </div>
                            <div class="col-md-3 text-center">
                                <img src="public/assets/img/icono_title.png" alt="Item servicio" class="img-circle img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="align-content-between">
                            <a href="#" onclick="tarjetaServicio('.$reg->id_servicio.');" class="btn btn-sm bg-success">
                                <i class="fas fa-file-signature"></i> Tarjeta
                            </a>
                            <a href="#" onclick="historialServicio('.$reg->id_persona.');" class="btn btn-sm bg-primary">
                                <i class="fas fa-file-invoice-dollar"></i> Historial
                            </a>
                        </div>
                    </div>
                </div>
            </div>';
            }
            echo $targeta;
            break;

    }
} else {
    
}


function drawTarget($rsp){

}

?>