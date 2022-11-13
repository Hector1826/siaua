<?php 
require_once("../model/ModelPeriodo.php");

if(isset($_GET['ACTN'])){
    $periodoObj = new ModelPeriodo();
    $id_periodo = isset($_POST['id_periodo']) ? $_POST['id_periodo'] : '';
    switch($_GET['ACTN']){
        case "TBLIST";
            $rspta = $periodoObj->getListaPeriodo();
            $i = 1;
            $data = array();
            while($reg = $rspta->fetch_object()) { 
                $data[] = array(
                    "0" => $i++,
                    "1" => $reg->periodo_info,
                    "2" => $reg->periodo_inicia,
                    "3" => $reg->periodo_termina,
                    "4" => $reg->periodo_status ? '<span class="badge bg-danger">inactivo</span>' : '<span class="badge bg-success">activo</span>',
                    "5" => ($reg->periodo_status ? '<a class="btn bg-success btn-sm" href="#" onclick="disablePeriodo('.$reg->id_periodo.');" >
                                                       <i class="fas fa-edit"></i> HABILITAR
                                                    </a>' :
                                                    '<a class="btn bg-danger btn-sm" href="#" onclick="enablePeriodo('.$reg->id_periodo.');" >
                                                        <i class="fas fa-edit"></i> INHABILITAR
                                                    </a>').'<a class="btn bg-primary btn-sm ml-3" href="#" onclick="openModalEditPeriodo('.$reg->id_periodo.');" >
                                                        <i class="fas fa-edit"></i> EDITAR
                                                    </a>');
            }
            $res = array(
                "sEcho" => 1,
                "iTotalRecors" =>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data );
            echo json_encode($res);
            break;
        case "ENABLE_PERIODO";
            $rspta = $periodoObj->enablePeriodo($id_periodo);
            echo $rspta ? ENABLE_SUCCESS : RSPTA_FAIL;
            break;
        case "DISABLE_PERIODO";
            $rspta = $periodoObj->disablePeriodo($id_periodo);
            echo $rspta ? DISABLE_SUCCESS: RSPTA_FAIL;
            break;
        case "ROW_ID";
            $rspta = $periodoObj->selectPeriodoID($id_periodo);
            echo $rspta ? json_encode($rspta): RSPTA_FAIL;
            break;
    }
}else { }
?>