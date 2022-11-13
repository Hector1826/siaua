<?php 
require_once("../config/Conexion.php");

/**
 * ModelServicioDireccion
 */
class ModelServicioDireccion{    
    /**
     * Method __construct
     *
     * @return void
     */
    function __construct() { }
    
    /**
     * Method insertServicioDireccion
     *
     * @param String $tipo_via [Tipo de via, ej: Callejon, Calle, Via]
     * @param String $calle [Nombre de la calle]
     * @param String $numero [Numero de la calle / S / N]
     * @param Int $id_manzana [Identificador de la manzana]
     * @param Int $id_servicio [Identificador del servicio]
     *
     * @return boolean
     */
    function insertServicioDireccion($tipo_via, $calle, $numero, $id_manzana, $id_servicio){
        return queryExecute("INSERT INTO 
                                    servicio_direccion( id_servicio_direccion, direccion_tipo, direccion_calle, direccion_numero, id_manzana, id_servicio)
                            VALUES(0, '$tipo_via', '$calle', '$numero', $id_manzana, $id_servicio)");
    }
}
?>