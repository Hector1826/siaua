<?php 
# Se inclulle la conexión a la DB.
require_once("../config/Conexion.php");
/**
 * ModelEdoCivil
 */
class ModelEdoCivil{    
    /**
     * Method __construct
     *
     * @return void
     */
    function __construct() { }
    
    /**
     * Method selectList
     *  Obtiene la lista del Estado civil
     * @return object
     */
    function selectList(){
        return queryExecute("SELECT * FROM estado_civil");
    }
}
?>