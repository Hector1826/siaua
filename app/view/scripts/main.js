

/**-------------------------------------------------------------
 * Muestra el modulo de inicio tras iniciar sesión exitosamente
 *-------------------------------------------------------------**/ 
function init(){
    $.post(PAGE_HOME, function(response){
        $("#panel_container").html(response);
        $("#page-title").html("");
        $(".content-header").addClass('hide');
    });
}
/** 
 *  onClickImage
 * -------------------------------------------
 * Reemplaza imagen del slider por la seleccionada.
 */
 function onClickImage(img){
    var urlImg = '<img src="public/assets/img/';
    switch(img){
        case 1:
            $("#gallery").html(urlImg.concat('img_01.jpg').concat('" class="product-image justify-content-center" style="height: 550px;">'));
            break;
        case 2:
            $("#gallery").html(urlImg.concat('img_02.jpg').concat('" class="product-image justify-content-center" style="height: 550px;" >'));
            break;
        case 3:
            $("#gallery").html(urlImg.concat('img_03.jpg').concat('" class="product-image justify-content-center" style="height: 550px;" >'));
            break;
        case 4:
            $("#gallery").html(urlImg.concat('img_04.jpg').concat('" class="product-image justify-content-center" style="height: 550px;" >'));
            break;
        case 5:
            $("#gallery").html(urlImg.concat('img_05.jpg').concat('" class="product-image justify-content-center" style="height: 550px;" >'));
            break;
    }
}

/** 
 *  * Vista inicio
 * -------------------------------------------
 *  Cuando se pulsa sobre la opción Inicio
 */
 $("#tab_home").on("click", function(){ 
    init();
});

/** 
 *  * Vista Servicio / Buscador
 * -------------------------------------------
 *  Cuando se pulsa sobre la opción Servicio
 */
 $("#tab_buscador").on("click", function(){
    $.post(PAGE_BUSCADOR, function(resp){
        $("#panel_container").html(resp);
        $("#page-title").html("Persona - Servicio: " + 
            "<button class='btn btn-sm btn-primary' onclick='openModPersonaServicio()'><i class='fa fa-plus-circle'></i> Registro</button>");
            initSelectManzana();
    });
});

/** 
 *  * Vista Manzana
 * -------------------------------------------
 *  Cuando se pulsa sobre la opción Manzana
 */
 $("#tab_manzana").on("click", function(){
    $.post(PAGE_MANZANA, function(resp){
        $("#panel_container").html(resp);
        $("#page-title").html("Manzanas: " + "<button class='btn btn-sm btn-primary' onclick='openModalManzana()'><i class='fa fa-plus-circle'></i> Agregar</button>");
        initViewManzana();
    });
});

/** 
 *  * Vista Periodo
 * -------------------------------------------
 *  Cuando se pulsa sobre la opción Periodo
 */
$("#tab_periodo").on("click", function(){
    $.post(PAGE_PERIODO, function(resp){
        $("#panel_container").html(resp);
        $("#page-title").html("Periodo: " + 
            "<button class='btn btn-sm btn-primary' onclick='openModalEditPeriodo()'><i class='fa fa-plus-circle'></i> Agregar</button>");
        initViewPeriodo();
        
    });
});

/** 
 *  * Vista Gasto
 * -------------------------------------------
 *  Cuando se pulsa sobre la opción Gasto
 */
$("#tab_gasto").on("click", function(){
    $.post(PAGE_GASTO, function(resp){
        $("#panel_container").html(resp);
        $("#page-title").html("Gastos: " + "<button class='btn btn-sm btn-primary' onclick='openModalGasto()'><i class='fa fa-plus-circle'></i> Agregar</button>");
        initViewGasto();
    });
});

/** 
 *  * Vista Reporte
 * -------------------------------------------
 *  Cuando se pulsa sobre la opción Reportes
 */
$("#tab_reporte").on("click", function(){
    $.post(PAGE_REPORTE, function(resp){
        $("#panel_container").html(resp);
        $("#page-title").html("Reporte: " + "<button class='btn btn-sm btn-primary' onclick='addReporte()'><i class='fa fa-plus-circle'></i> Agregar</button>");
    });
});

/** 
 *  * Vista Acceso
 * -------------------------------------------
 *  Cuando se pulsa sobre la opción Acceso
 */
$("#tab_accesos").on("click", function(){
    $.post(PAGE_ACCESO, function(resp){
        $("#panel_container").html(resp);
        $("#page-title").html("Accesos: " + "<button class='btn btn-sm btn-primary' onclick='openModalAcceso()'><i class='fa fa-plus-circle'></i> Agregar</button>");
        initViewAcceso();
    });
});



var Toast;
Toast = Swal.mixin({
    toast: true,
    animation: true,
    position: 'center'

});
function alert_rspt_success(tipo){
    Toast.fire({
        icon: 'success',
        title: tipo,
        showConfirmButton: false,
        timer: 5000
    });
}

function alert_rspt_error(tipo){
    Toast.fire({
        icon: 'error',
        title: tipo,
        showConfirmButton: false,
        timer: 3000
    });
}
/**
 * Confirmación para la eliminación de posibles registros
 * @param {int} id Es el identificador del registro que se intenta eliminar
 * @param {String} url_controller Dirección del Controlador asociado con la vista
 * @param {String} param Parameto que buscara el controlador para realizar el borrado del registro
 */
function alert_question_delete(){
    return Toast.fire({
        title: '¿Está seguro que desea eliminar este registro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        showConfirmButton: true,
        confirmButtonColor: '#2d89f2',
        cancelButtonColor: '#9a9a9c',
        confirmButtonText: '¡Sí, bórralo!',
        cancelButtonText: 'Cancelar'
        });
}
init();