<?php 
require_once("../model/ModelManzana.php");
// Validamos si existe el parametro el cual su valor indica que vamos a realizar.
if(isset($_GET['ACTN'])){
    

        // Instaciamos el modelo
    $manzanaObj = new ModelManzana();
    $id_manzana = isset($_POST['id_manzana']) ? $_POST['id_manzana'] : '';
    $manzanaNombre = isset($_POST['txt_nombre_manzana']) ? $_POST['txt_nombre_manzana'] : '';
    $manzana_des = isset($_POST['manzana_des']) ? $_POST['manzana_des'] : '';
    switch($_GET['ACTN']){
        #region Obtiene listado co  información de cada manzana que se mostrara en la tabla
        case "TBLIST":
            $rspta = $manzanaObj->selectListDetails();
            $i = 1;
            $data = array();
            while($reg = $rspta->fetch_object()) { 
                #$classCss = $reg->numero_persona != 0 &&  $reg->numero_servicio != 0 ? 'btn bg-danger btn-sm disabled' : 'btn bg-danger btn-sm';
                $data[] = array(
                    "0" => $i++,
                    "1" => $reg->manzana_nombre,
                    "2" => $reg->numero_personas,
                   "3" => $reg->numero_servicios,
                    "4" => '<a class="btn bg-primary btn-sm" href="#" onclick="detalleManzana('.$reg->id_manzana.');" >
                                <i class="fas fa-file-alt mr-2"></i> Reporte
                            </a>');
            }
            $res = array(
                "sEcho" => 1,
                "iTotalRecors" =>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data );
            echo json_encode($res);
            break;
        #endregion
        #region SELECT_LIST
        case "SELECT_LIST":
            $rspta = $manzanaObj->selectList();
            echo '<option selected="selected">- Selecciona -</option>';
            while($row = $rspta->fetch_object()){
                echo '<option value='.$row->id_manzana.'>'.$row->manzana_nombre.'</option>';
            }
            break;
        #endregion
        #region Registra nueva manzana
        case "INSERT_MANZANA":
            $rspta =  $manzanaObj->insertRow($manzanaNombre, $manzana_des);
            echo $rspta ? INSERT_SUCCESS : RSPTA_FAIL;
            break;
        #endregion
        #region Edición | Datos de manazana
        case "EDIT_MANZANA":
            $rspta = $manzanaObj->updateRow($id_manzana,$manzanaNombre, $manzana_des);
            echo $rspta ? UPDATE_SUCCESS : RSPTA_FAIL;
            break;
        #endregion
    }

} else {
     
}
?>