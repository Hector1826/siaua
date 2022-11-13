<?php 
# Se inclulle la conexión a la DB.
require_once("../config/Conexion.php");
/**
 * ModelPersona
 */
class ModelPersona {    
    /**
     * Method __construct
     *
     * @return void
     */
    function __construct() { }

    /**
     * Method selectList
     *  
     * @return object
     */
    function getPersonaManzana($id_manzana){
        return queryExecute("SELECT 
                                p.id_persona, s.id_servicio,
                                CONCAT(p.persona_nombre,' ', p.persona_ape_pat,' ',p.persona_ape_mat) as responsable,
                                CONCAT(ds.direccion_tipo,' ', ds.direccion_calle,' ', ds.direccion_numero) as calle,
                                m.manzana_nombre, m.id_manzana
                            FROM persona p
                            INNER JOIN servicio s ON
                                p.id_persona = s.id_persona
                            INNER JOIN servicio_direccion ds ON
                                ds.id_servicio = s.id_servicio
                            INNER JOIN manzana m ON
                                m.id_manzana = ds.id_manzana
                            WHERE s.servicio_direc_actual = 1 AND 
                                m.id_manzana = $id_manzana");
    }

    function validateAcceso($user, $pass){
        return queryRowID("SELECT * FROM acc");
    }

       /**
     * Method intertRow
     *
     * @return boolean
     */
    function intertRowGetID($persona_nombre, $persona_ape_pat, $persona_ape_mat, $id_estado_civil){
        return queryExecuteGetID("INSERT INTO
                                    persona(id_persona, persona_nombre, persona_ape_pat, persona_ape_mat, persona_status, id_estado_civil )
                            VALUES(0, '$persona_nombre', '$persona_ape_pat', '$persona_ape_mat', 1, $id_estado_civil)");
    }
    
    /**
     * Method selectName
     *
     * @param $id $id [explicite description]
     *
     * @return array
     */
    function selectName($id){
        return queryRowID("SELECT 
                                p.*
                            FROM 
                                persona p 
                            WHERE
                                p.id_persona=$id");
    }
    /**
     * Method selectListItems
     *
     * @return object
     */
    function selectListItems(){
        return queryExecute("SELECT * FROM persona");
    }

    /**
     * Method selectRowId
     *
     * @param $id $id [explicite description]
     *
     * @return array
     */
    function selectDetailsRowId($id){
        return queryRowID("SELECT
                            p.persona_nombre,
                            p.persona_status,
                            CONCAT(
                                p.persona_ape_pat,
                                ' ',
                                p.persona_ape_mat
                            ) AS ape,
                            CONCAT(
                                ds.direccion_tipo,
                                ' ',
                                ds.direccion_calle,
                                ' ',
                                ds.direccion_numero
                            ) AS calle,
                            m.manzana_nombre,
                            e.estado_civil
                        FROM
                            persona p
                        INNER JOIN servicio s ON
                            p.id_persona = s.id_servicio
                        INNER JOIN servicio_direccion ds ON
                            ds.id_servicio = s.id_servicio
                        INNER JOIN manzana m ON
                            m.id_manzana = ds.id_manzana
                        INNER JOIN estado_civil e ON
                            e.id_estado_civil = p.id_estado_civil
                        WHERE
                            s.servicio_direc_actual = 1 
                        AND 
                            p.id_persona=$id
                        "
        );
    }
    
    /**
     * Method updateRow
     *
     * @return boolean
     */
    function updateRow($id_persona, $persona_nombre,$persona_ape_pat,$persona_ape_mat,$persona_status,$id_estado_civil){
        return queryExecute("UPDATE 
                                persona
                            SET
                                persona_nombre='$persona_nombre',
                                persona_ape_pat='$persona_ape_pat',
                                persona_ape_mat='$persona_ape_mat',
                                persona_status=$persona_status,
                                id_estado_civil=$id_estado_civil
                            WHERE
                                id_persona=$id_persona");
    }

     /**
     * Method enableRow
     *
     * @return boolean
     */
    function enableRow($id){
        return queryExecute("UPDATE persona SET persona_status=1 WHERE id_persona=$id");
    }
    
    /**
     * Method disabledRow
     *
     * @return boolean
     */
    function disabledRow($id){
        return queryExecute("UPDATE persona SET persona_status=o WHERE id_persona=$id");
    }
    
    /**
     * Method getDataPersona
     *
     * @param $id $id [explicite description]
     *
     * @return Array
     */
    function getDataPersona($id){
        return queryRowID("SELECT
                                sd.id_manzana,
                                sd.direccion_tipo, 
                                sd.direccion_calle, 
                                sd.direccion_numero,
                                p.id_estado_civil,
                                p.id_persona,
                                p.persona_nombre,
                                p.persona_ape_pat,
                                p.persona_ape_mat
                            FROM 
                                servicio     s INNER JOIN persona p 
                            ON 
                                p.id_persona = s.id_persona 
                            INNER JOIN 
                                servicio_direccion sd 
                            ON 
                                s.id_servicio = sd.id_servicio
                            WHERE 
                                s.servicio_direc_actual = 1
                            AND 
                                p.id_persona =$id");
    }
}
?>