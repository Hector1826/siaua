/**--------------------------------------------
 **  Realiza peticón para obtener los datos
 **   de la persona seleccionada
 *---------------------------------------------**/
function datosPersona(id){
    $.post(
        CTROL_PERSONA.concat('DETAILS_ROW_ID'),
        { 'id_persona': id },
        function (rspta) {
            d = JSON.parse(rspta);
            $("#id_persona").html(id);
            $("#txt_nombre").html(d.persona_nombre);
            $("#txt_ape").html(d.ape);
            $("#txt_direccion").html(d.calle);
            $("#txt_manzana").html(d.manzana_nombre);
            $("#txt_edo_civil").html(d.estado_civil);
            $("#txt_status_persona").html(d.persona_status != 1 ? "INACTIVO": "ACTIVO");
        }
    );
}  

/**--------------------------------------------
 **  Llenado del formulario con los datos de la
 ** persona.
 *---------------------------------------------**/
function getDataPersonaModal(id){
    $.post(
        CTROL_PERSONA.concat('ROW_ID'), 
        { 'id_persona': id },
        function(rspta){
            d = JSON.parse(rspta);
            $("#id_persona").val(id);
            $("#id_nombre_persona").val(d.persona_nombre);
            $("#id_apepat").val(d.persona_ape_pat);
            $("#id_apemat").val(d.persona_ape_mat);
            
            $("#manzana").val(d.id_manzana);
            $("#manzana").selectpicker('refresh');

            $("#direccion_tipo").val(d.direccion_tipo);
            $("#direccion_tipo").selectpicker('refresh');

            $("#id_direccion").val(d.direccion_calle);

            $("#id_edo_civil").val(d.id_estado_civil);
            $("#id_edo_civil").selectpicker('refresh');
        }
    );
}

/**--------------------------------------------
 **  Guarda los cambios realizados sobre los 
 **  datos de la persona.
 *---------------------------------------------**/
function saveChangeData(event){
    event.preventDefault();
    var formData = new FormData($("#formPersona")[0]);
    console.log(formData);
    $.ajax({
        url: CTROL_PERSONA.concat('EDIT_P'),
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data);
            if (data == "FAIL") {
                alert_rspt_error("Ocurrio un problema, vuelve a intentarlo");
            } else {
                alert_rspt_success(data);
                $('#modalPersona').modal('hide');
                initDetallePersona($("#id_persona").val());
                $("#formPersona")[0].reset();
            }
        }
    });
}
/**--------------------------------------------
 **  Retorna a la vista anterior
 *---------------------------------------------**/
 function toBack(){
    $.post(PAGE_BUSCADOR, function(resp){
        $("#panel_container").html(resp);
        $("#page-title").html("Persona - Servicio: " + 
            "<button class='btn btn-sm btn-primary' onclick='openModPersonaServicio()'><i class='fa fa-plus-circle'></i> Registro</button>");
           initSelectManzana();
    });
}

/**--------------------------------------------
 **  Es la fuincción encargada de relaizar las diferentes
 **      llamadas para mostar la información referente al usuario seleccionado
 *---------------------------------------------**/
function initDesallePersona(id){       
    datosPersona(id); // Datos personalaes
    select_edo_civil(); // Carga selector de estado civil
    select_manzana();   // Carga slecctor de Manmmzans
    $("#id_tipo_via").selectpicker(); // Inicialioza el componene selector de tipo de via.
    serviciosPersona(id);
    // En escucha de que se lancen sus respectivos eventos
    $("#formPersona").on('submit', function(e){ // Edición de los datos de la persona
        saveChangeData(e);
    });

    // Muestra modal para editar los datos de la persona
    $("#open_modal_persona").on('click', function(event){
        getDataPersonaModal(id);
        $('#modalPersona').modal({
            show: true,
            backdrop: 'static'
        });
    });
}

/**  
 * ? FUNCIONES PARA #SERVICIOS#
 *  ---------------------------------------------
 * * 
 *---------------------------------------------*/

// Retorna el número de servicios que cuenta la persona
function serviciosPersona(id){
    $.post(
        CTROL_SERVICIO.concat('LIST_SERVICIO_PERSONA'),
        {'id_persona': id}, 
        function(rspta){
            $("#item_servicio").html(rspta);
    });
}

function tarjetaServicio(id_servicio){
    $('#modalTarjeta').modal({
        show: true,
        backdrop: 'static'
    });
}

function pagoServicio(id_servicio){
    $('#modalPagoServicio').modal({
        show: true,
        backdrop: 'static'
    });
}