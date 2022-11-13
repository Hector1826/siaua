<?php
define("DS",DIRECTORY_SEPARATOR);
define("APP","app".DS);
define("CONFIG",APP."config".DS);
define("CONTROLLER",APP."controller".DS);
define("MODEL",APP."model".DS);
define("VIEW",APP."view".DS);
session_start();

$_SESSION['Comite'] = "Héctor";
include(VIEW."include".DS."IncludeHeader.php");
if (isset($_SESSION['Comite'])) { # Valida si existe la sesión Comite iniciada se pasa el login y muestra el sistema
    #include(VIEW."include".DS."HeaderInclude.php");
    include(VIEW."ViewTemplate.php");
    
    #include(VIEW."include".DS."HeaderInclude.php");

} else{  # De lo contrario nos manda a logearnos para poder acceder
    /**
     * TODO Incluir la vista de LoginView.php 
     * */
    include(VIEW."page".DS."ViewLogin.php");
}
include(VIEW."include".DS."IncludeFooter.php");

?>