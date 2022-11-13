/**-------------------------------------------------------------
 * * Carga en un elemento HTML "select", los nombres de las personas registradas
 *-------------------------------------------------------------**/ 
 function select_persona(){
    $.post(CTROL_PERSONA.concat('SELECT_LIST'), function(rspta){
            $("#id_persona").html(rspta);
            $("#id_persona").selectpicker('refresh');
        }
    );
}
/**-------------------------------------------------------------
 * * Carga en un elemento HTML "select", los nombres de las Manzanas registradas
 *-------------------------------------------------------------**/ 
 function select_manzana(){
    $.post(CTROL_MANZANA.concat('SELECT_LIST'), function(rspta){
            // Select Filtro 
            $("#id_manzana").html(rspta);
            $("#id_manzana").selectpicker('refresh');

            $("#id_manzana_modal").html(rspta);
            $("#id_manzana_modal").selectpicker('refresh');
            
            $("#manzana").html(rspta);
            $("#manzana").selectpicker('refresh');

        }
    );
}

/**-------------------------------------------------------------
 * * Carga en un elemento HTML "select", los nombres de los Estados Civiles registradas
 *-------------------------------------------------------------**/ 
 function select_edo_civil(){
    $.post(CTROL_EDOCIVIL.concat('SELECT_LIST'), function(rspta){
            $("#id_edo_civil").html(rspta);
            $("#id_edo_civil").selectpicker('refresh');
        }
    );
}