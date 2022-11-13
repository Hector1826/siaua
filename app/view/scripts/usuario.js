
const CTROL_PERSONA = 'app/controller/ControllerPersona.php?ACTN=';
$("#formLogin").on("submit", function(ev){
    ev.preventDefault();
    alert_rspt_success('Bienvenido');
    //init();
    //validaUsuario();
});
function simularAcceso(flag){
    if(flag)
        alert_rspt_success('Bienvenido');
    else
        alert_rspt_error('Credenciales incorrectas');
}
function validaUsuario(){
    user = $("#txt_user").val();
    pass = $("#txt_pass").val();
    $.post("app/controller/ControllerPersona.php?ACTN=LOGIN",
        { "acceso_user":user, "acceso_pass":pass },
        function(res){
            if(res !== "success"){ // # NO entrara al sistema y se mostrara al usuario.
                msgModal(res);
            } else{
                acceso();
            }
        }
    );
}