<?php 
require_once("../config/Conexion.php");

/**
 * ModelPeriodo
 */
class ModelPeriodo{    
    /**
     * Meodo contructor
     * @return void
     */
    function __construct() { }
    
    /**
     * Method insertPeriodo
     *  Registra nuevo periodo
     * @return boolean
     */
    function insertPeriodo($periodo_info,$periodo_inicia,$periodo_termina,$periodo_status){
        return queryExecute("INSERT INTO periodo(id_periodo, periodo_info, periodo_inicia, periodo_termina, periodo_status)
                                VALUES(0,'$periodo_info', '$periodo_inicia'.'$periodo_termina',$periodo_status)");
    }
    
    /**
     * Method updatePeriodo
     *
     * @param Integer $id_periodo Id del periodo a editar
     * @param String $periodo_info Descripción del periodo
     * @param String $periodo_inicia Fecha d einicio
     * @param String $periodo_termina Fecha de termino
     * @param Boolean $periodo_status Estado del periodo
     *
     * @return boolean
     */
    function updatePeriodo($id_periodo, $periodo_info, $periodo_inicia, $periodo_termina, $periodo_status){
        return queryExecute("UPDATE periodo SET periodo_info='$periodo_info',
                                                periodo_inicia='$periodo_inicia',
                                                periodo_termina='$periodo_termina',
                                                periodo_status=$periodo_status
                                            WHERE
                                                id_periodo=$id_periodo");
    }
    
    /**
     * Method getListaPeriodo
     *  Obtiene todos los registros de la taba periodo
     * @return Object
     */
    function getListaPeriodo(){
        return queryExecute("SELECT * FROM periodo");
    }
    
    /**
     * Method enablePeriodo
     * Cambia el estado del periodo a ACTIVO
     * @param Integer $id_periodo ID del periodo que se activara
     *
     * @return boolean
     */
    function enablePeriodo($id_periodo){
        return queryExecute("UPDATE periodo SET periodo_status=1
                                    WHERE id_periodo=$id_periodo");
    }
    
    /**
     * Method disablePeriodo
     * Cambia el estado del periodo a INACTIVO
     * @param Integer $id_periodo ID del periodo que se INABILITARA
     *
     * @return boolean
     */
    function disablePeriodo($id_periodo){
        return queryExecute("UPDATE periodo SET periodo_status=0
                                    WHERE id_periodo=$id_periodo");
    }
    
   
    function selectPeriodoID($id_periodo){
        return queryRowID("SELECT * FROM periodo WHERE id_periodo=$id_periodo");
    }
}
?>