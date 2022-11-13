function initViewManzana(){
    tbManzana();
    $("#formManzana").on('submit', function(e){
        guardaDatosManzana(e);
    });
}

function tbManzana(){
    $("#tb_manzana").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "ajax": {
            url: CTROL_MANZANA.concat('TBLIST'),
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

function openModalManzana(){
    $("#formManzana")[0].reset();
    $("#operacion").val("INSERT");
    $('#modalManzana').modal({
        show: true,
        backdrop: 'static'
    });
}

function guardaDatosManzana(event){
    event.preventDefault();
    var formData = new FormData($("#formManzana")[0]);
    var KEY;
    if( $("#operacion").val() == "INSERT"){
        KEY = 'INSERT_MANZANA';
    } else {
        KEY = 'UPDATE_MANZANA';
    }
    $.ajax({
        url: CTROL_MANZANA.concat('INSERT_MANZANA'),
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data == "FAIL") {
                alert_rspt_error("Ocurrio un problema, vuelve a intentarlo");
            } else {
                $("#formManzana")[0].reset();
                alert_rspt_success(data);
                tbManzana();
                $('#modalManzana').modal('hide');
            }
        }
    });
}

function detalleManzana(id_manzana){

}