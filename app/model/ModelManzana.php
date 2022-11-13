<?php 
# Se inclulle la conexión a la DB.
require_once("../config/Conexion.php");

/**
 * ModelManzana
 */
class ModelManzana  {
    function __construct() { }
    
    /**
     * Method selectList
     *  * Obtiene  listado de las manzanas registradas
     * @return Object
     */
    function selectList(){
        return queryExecute("SELECT * FROM manzana");
    }
    
    /**
     * Method selectRowId
     *
     * @param int $id Identificador unico de la fila
     *  * Obtiene fila con el id que se le indica como parametro
     * @return array
     */
    function selectRowId($id){
        return queryRowID("SELECT * FROM manzana WHERE id_manzana=$id");
    }
        

    /**
     * Method selectListDetails
     * * Obtiene  listado detallado con numero de personas y servicios de las manzanas registradas
     * @return Object
     */
    function selectListDetails(){
        return queryExecute("SELECT
                                m.*,
                                (SELECT 
                                    COUNT(*)
                                FROM 
                                    persona p, servicio s, servicio_direccion sd
                                WHERE
                                    p.id_persona = s.id_persona
                                AND
                                    s.id_servicio = sd.id_servicio
                                AND
                                    sd.id_manzana = m.id_manzana
                                AND s.servicio_direc_actual = 1) AS numero_personas,
                                (SELECT 
                                    COUNT(*)
                                FROM 
                                    servicio s, servicio_direccion sd
                                WHERE
                                    s.id_servicio = sd.id_servicio
                                AND
                                    sd.id_manzana = m.id_manzana
                                AND
                                    s.servicio_status = 1) AS numero_servicios
                            FROM manzana m");
    }
    
    /**
     * Method insertRow
     *
     * @param string $manzana_nombre [Nombre de la manzana]
     * @param string $manzana_info [Pequeña descripción de la manzana]
     *  * Inserta un nuevo registro
     * @return boolean
     */
    function insertRow($manzana_nombre, $manzana_info='Manzana '){
        return queryExecute("INSERT INTO manzana(id_manzana, manzana_nombre, manzana_info)
                                VALUES
                                    (0,'$manzana_nombre','$manzana_info')");
    }
    
    /**
     * Method updateRow
     *
     * @param int $id_manzana [Identificado runico de la fila]
     * @param string $manzana_nombre [Nombre de la manzana]
     * @param string $manzana_info [Pequeña descripción de la manzana]
     * * Modifica los datos del registro con el $id indicado
     * @return boolean
     */
    function updateRow($id_manzana, $manzana_nombre, $manzana_info='Manzana '){
        return queryExecute("UPDATE manzana 
                                SET
                                    manzana_nombre='$manzana_nombre',
                                    manzana_info='$manzana_info'
                                WHERE
                                    id_manzana=$id_manzana");
    }
    
    /**
     * Method deleteRow
     *
     * @param $id $id [explicite description]
     * * Elimina registro con el $id indicado
     * @return boolean
     */
    function deleteRow($id){
        return queryExecute("DELETE FROM manzana WHERE id_manzana=$id");
    }
}
?>
