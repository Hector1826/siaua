<?php 
require_once("../model/ModelEdoCivil.php");
// Validamos si existe el parametro el cual su valor indica que vamos a realizar.
if(isset($_GET['ACTN'])){
    // Instaciamos el modelo
    $edoCivilObj = new ModelEdoCivil();

     # Valida el valor de la Variable ACTN
     switch($_GET['ACTN']){
        case "SELECT_LIST":
            $rspta = $edoCivilObj->selectList();
            echo '<option selected="selected">- Selecciona -</option>';
			while($row = $rspta->fetch_object()){
				echo '<option value='.$row->id_estado_civil.'>'.$row->estado_civil.'</option>';
			}
            break; 
     }
}else{
 //!  Redireccionar a vista de "Error de acceso" 
}
?>