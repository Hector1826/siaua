<?php 
require_once('../config/Conexion.php');

/**
 * ModelServicio
 */
class ModelServicio {    
    /**
     * Method __construct
     *
     * @return void
     */
    function __construct() { }
    
    /**
     * -------------------------------------------------------
     *  Obtiene el número de servicios que tiene la persona 
     *  cuyo id corresponda al parametro.
     *  @param int $id ID de la persona
     *  @return int Numero de servicios que te 
     * -------------------------------------------------------
     */
    function countService($id){
        return queryRowID("SELECT COUNT(*) AS SER_TOTAL FROM servicio WHERE id_persona =  $id");
    }
    
    
    /**
     * -------------------------------------------------------
     *  Retorna los servicios que tiene la persona asociados.
     * -------------------------------------------------------
     */
    function getServicioPersona($id_persona){
        return queryExecute("SELECT 
                                s.*,
                                CONCAT(ds.direccion_tipo,' ', ds.direccion_calle, ' ', ds.direccion_numero) AS calle,
                                m.manzana_nombre, p.id_persona
                            FROM 
                                persona p
                            INNER JOIN servicio s ON
                                p.id_persona = s.id_persona
                            INNER JOIN servicio_direccion ds ON
                                s.id_servicio = ds.id_servicio
                            INNER JOIN manzana m ON
                                m.id_manzana = ds.id_manzana
                            WHERE p.id_persona = $id_persona");
    }


    /**
     * Method insertServicio | Cuando ya existe la persona
     * -------------------------------------------------------
     * Agrega un nuevo servicio, ya sea desde el registro del usuario o
     * al dar de alta un nuevo servicio para una persona ya registrada
     * 
     * @param String $servicio_folio [Folio o numero del servicio]
     * @param String $servicio_info [Descripción del lugar, servico, persona]
     * @param String $servicio_fecha_alta [Fecha en que se realiza el registro ]
     * @param int $id_persona [Identificador de la persona a la cual le pertece el servicio]
     *
     * @return boolean
     */
    function insertServicioPersona($servicio_folio, $servicio_info, $servicio_fecha_alta, $servicio_fecha_baja='0000-00-00', $servicio_direc_actual, $id_persona){
        return queryExecuteGetID("INSERT INTO 
                                    servicio (id_servicio, servicio_folio, servicio_info, servicio_fecha_alta, servicio_fecha_baja, servicio_status, servicio_direc_actual, id_persona)
                                VALUES(0,'$servicio_folio','$servicio_info','$servicio_fecha_alta', $servicio_fecha_baja, 1, $servicio_direc_actual, $id_persona)");
    }
    
    /**
     * Method updateServicio
     * -------------------------------------------------------
     * Modifica los datos de un servicio
     * @param int $id_servicio [Identifiador del servicio a modificar sus datos]
     * @param String $servicio_folio [Folio o numero del servicio]
     * @param String $servicio_info [Descripción del lugar, servico, persona]
     * @param String $servicio_fecha_alta [Fecha en que se realiza el registro ]
     * @param int $id_persona [Identificador de la persona a la cual le pertece el servicio]
     *
     * @return boolean
     */
    function updateServicio($id_servicio, $servicio_folio, $servicio_info, $servicio_fecha_alta, $id_persona){
        return queryExecute("UPDATE servicio SET
                                servicio_folio='$servicio_folio',
                                servicio_info='$servicio_info',
                                servicio_fecha_alta='$servicio_fecha_alta',
                                servicio_direc_actual=$id_persona,
                                id_persona=$id_persona");
    }

    function enableServicio($id){
        return queryExecute("UPDATE servico SET servicio_status = 2 ");

    }
}
?>