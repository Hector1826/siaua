/**--------------------------------------------------------------------------------------------
 * *                   Contoller urls
 * Constantes para acceder al controlador de las vistas
 *-------------------------------------------------------------------------------------------**/
function initSelectManzana(){
    select_manzana();
    // Evento que se dispara cuando se selecciona un item de la lista
    $("#id_manzana").change(function () {
        tbPersona($(this).val());
    });
    $("#formServicioPersona").on("submit", function(e){
        insertPerSerSerDire(e);
    });
    $("#formServicio").on('submit', function(e){
        insertServicio(e);
    });
}

function tbPersona(item){

    $("#tb_agua").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true, 
        "autoWidth": true,
        "responsive": true,
        "ajax": {
            url: CTROL_PERSONA.concat('TBLIST'),
            data: {"id_manzana": item},
            type: "GET",
            dataType: "JSON",
            error: function (e) {
                console.log(e.responseText);
            },
        },
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "asc"]],
        "oLanguage": {
            "sProcessing": "Procesando...",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "No existen registros para esta manazana",
            "sInfo": "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Por favor espere - cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            }
        }
    });
}
//#region 
/**--------------------------------------------
 **          Modal - Servicio Persona
 *---------------------------------------------**/
    
function openModPersonaServicio(){
    select_edo_civil();
    select_manzana();
    $("#id_tipo_via").selectpicker();
    $('#modalServicioPersona').modal({
        show: true,
        backdrop: 'static'
    });
    
}

// Genera el registro de una persona con su respectivo servicio.
// Per = tb persona | Ser = tb Servicio | SerDire = tb servicio_dirección 
function insertPerSerSerDire(event){
    event.preventDefault();
    var formData = new FormData($("#formServicioPersona")[0]);
    console.log(formData);
    $.ajax({
        url: CTROL_PERSONA.concat('INSERT_P_S_SP'),
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
                $('#modalServicioPersona').modal('hide');
                tbPersona($("#manzana").val());
                $("#formServicioPersona")[0].reset();
            }
        }
    });
}
//#endregion
/**--------------------------------------------
 **          Modal - Servicio 
 *---------------------------------------------**/
function openModalServicio(id_persona){
    $("#id_persona").val(id_persona);
    $("#id_tipo_via_n").selectpicker('refresh');
    select_manzana();
    getNombrePersona(id_persona);
    $("#nombre_persona").attr('disabled','disabled');
    $('#modalServicio').modal({
        show: true,
        backdrop: 'static'
    });
}

/**
 * * Función: getNombrePersona
 *  Obtiene el nombre 
 */
 function getNombrePersona(id) {
    $.post(CTROL_PERSONA.concat('NAME'), 
        {'id_persona' : id}, function(name){
            d = JSON.parse(name);
            $("#nombre_persona").val(d.persona_nombre+' '+ d.persona_ape_pat +' '+ d.persona_ape_mat);
            
        }
    );
}

function insertServicio(event){
    event.preventDefault();
    var formData = new FormData($("#formServicio")[0]);
    $.ajax({
        url: CTROL_SERVICIO.concat('ADD_SERVICIO_PERSONA'),
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data == "FAIL") {
                alert_rspt_error("Ocurrio un problema, vuelve a intentarlo");
            } else {
                $("#formServicio")[0].reset();
                alert_rspt_success(data);
                $('#modalServicio').modal('hide');
            }
        }
    });
}
/**--------------------------------------------
 **          Modal - Servicio 
 *---------------------------------------------**/
function detallePersona(id_persona){
    $.post(PAGE_PERSONA_DETALLE, function(rspta){
        $("#panel_container").html(rspta);
        $("#page-title").html("<a class='btn btn-sm bg-info' onclick='toBack()'><i class='fas fa-caret-left'></i></a> Detalle");
        //$(".content-header").addClass('slow');
        initDesallePersona(id_persona);
    });
}