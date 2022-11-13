function enablePeriodo(id){
    $.post(CTROL_PERIODO.concat('ENABLE_PERIODO'),
        {'id_periodo': id},
        function(rspta){
            if(rspta == "FAIL"){
            alert_rspt_error("Ocurrio un problema, vuelve a intentarlo");
            } else {
                alert_rspt_success(data);
            }
        }
    );
}
function disablePeriodo(id){ 
    $.post(CTROL_PERIODO.concat('DISABLE_PERIODO'),
        {'id_periodo': id},
        function(rspta){
            if(rspta == "FAIL"){
            alert_rspt_error("Ocurrio un problema, vuelve a intentarlo");
            } else {
                alert_rspt_success(data);
            }
        }
    );
}
function openModalEditPeriodo(id){ 
    $("#modalPeriodo").modal({
        show: true,
        backdrop: 'static'
    });
}
function initViewPeriodo(){
    tbPeriodo();
    $("#formPeriodo").on('submit', function(e){
        guardaDatosPeriodo(e);
    });       
}
function tbPeriodo(){
    $("#tb_periodo").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "ajax": {
            url: CTROL_PERIODO.concat('TBLIST'),
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
            "sEmptyTable": "No existen registros",
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

function guardaDatosPeriodo(event){
    event.preventDefault();
}