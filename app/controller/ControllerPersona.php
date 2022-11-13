<?php 
require_once("../model/ModelPersona.php");
require_once("../model/ModelServicio.php");
require_once("../model/ModelServicioDireccion.php");
// Validamos si existe el parametro el cual su valor indica que vamos a realizar.
if(isset($_GET['ACTN'])){
    #region Parametros obtenidos por metodo POST
    $desc_servicio = isset($_POST['desc_servicio']) ? $_POST['desc_servicio'] : '';
    $fecha_registro = date('Y-m-d');
    $folio = isset($_POST['id_folio']) ? $_POST['id_folio'] : '';
    $manzana = isset($_POST['manzana']) ? $_POST['manzana'] : '';
    $idTipoVia = isset($_POST['id_tipo_via']) ? $_POST['id_tipo_via'] : '';
    $direccion = isset($_POST['id_direccion']) ? $_POST['id_direccion'] : '';
    $numeroCalle = isset($_POST['id_numero']) ? $_POST['id_numero'] : '';
    $nombrePersona = isset($_POST['id_nombre_persona']) ? $_POST['id_nombre_persona'] : '';
    $nombreApePat = isset($_POST['id_apepat']) ? $_POST['id_apepat'] : '';
    $nombreApeMat = isset($_POST['id_apemat']) ? $_POST['id_apemat'] : '';
    $id_edo_civil = isset($_POST['id_edo_civil']) ? $_POST['id_edo_civil'] : '';
    $txt_idpersona = isset($_POST['id_persona']) ? $_POST['id_persona'] : "";
    $id_manzana_get = isset($_GET['id_manzana']) ? $_GET['id_manzana'] : '';
    $Status = 1;
    #endregion
    // Instaciamos el modelo
    $personObj = new ModelPersona();
    $serviceObj = new ModelServicio();
    $serviceDirecObj = new ModelServicioDireccion();
    switch($_GET['ACTN']){
        #region Lista de personas por Manzana
        case "TBLIST":
            $rspta = $personObj->getPersonaManzana($id_manzana_get);
            $i = 1;
            $data = array();
            while($reg = $rspta->fetch_object()){
                $data[] = array(
                    "0" => $i++,
                    "1" => $reg->responsable,
                    "2" => $reg->manzana_nombre,
                    "3" => $reg->calle, 
                    "4" => '<a class="btn bg-navy btn-sm" href="#" onclick="detallePersona('.$reg->id_persona.');" >
                                <i class="fas fa-address-book"></i>
                                    Detalles
                            </a>
                            <a class="btn bg-blue btn-success btn-sm" href="#" onclick="openModalServicio('.$reg->id_persona.');" >
                                <i class="fa fa-plus-circle"> </i>
                                    Servicio
                            </a>'
                );
            }
            $res = array(
                "sEcho" => 1,
                "iTotalRecors" =>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data );
            echo json_encode($res);
            break;
        #endregion
        #region Obtiene la fila según el ID recibido
        case "NAME":
            $rspta = $personObj->selectName($txt_idpersona);
            echo json_encode($rspta);
            break;
        #endregion
        #region Registro de persona y asignación del servicio correspondiente
        case "INSERT_P_S_SP":
            # Relaiza el registro de la persona y se obtiene el ID Autoincrementable que se asigno a dicho registro
            $id_rspt_persona = $personObj->intertRowGetID($nombrePersona, $nombreApePat, $nombreApeMat,$id_edo_civil);
            # Relaiza el registro del servicio y se obtiene el ID Autoincrementable que se asigno a dicho registro
            $id_rspta_servicio = $serviceObj->insertServicioPersona($folio,$desc_servicio,$fecha_registro,null, 1,$id_rspt_persona);
            # Relaiza registro en servicio_dirección y se obtiene el ID Autoincrementable que se asigno a dicho registro
            $rspta = $serviceDirecObj->insertServicioDireccion($idTipoVia,$direccion,$numeroCalle,$manzana, $id_rspta_servicio);
            echo $rspta ? INSERT_SUCCESS : RSPTA_FAIL;
            break;
        #endregion
        #region Obtiene los datos de la persona correspondientes al ID que se recibe
        case "DETAILS_ROW_ID":
            $rspta = $personObj->selectDetailsRowId($txt_idpersona);
            echo $rspta ? json_encode($rspta) : RSPTA_FAIL;
            break;
        #endregion
        #region Obtine los datos de la persona con su domicilio, estos se cargan en el modal para editar los datos del usuario.
        case "ROW_ID":
            $rspta = $personObj->getDataPersona($txt_idpersona);
            echo $rspta ? json_encode($rspta) : RSPTA_FAIL;
            break;
        #endregion
        #region Edita los datos de la persona
        case "EDIT_P":
            $rspta = $personObj->updateRow($txt_idpersona,$nombrePersona, $nombreApePat, $nombreApeMat,$Status, $id_edo_civil);
            echo $rspta ? UPDATE_SUCCESS : RSPTA_FAIL;
            break;
        #endregion
    }

} else {
     
}
?>