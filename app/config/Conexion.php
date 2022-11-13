<?php 

require_once 'global.php';

$connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

mysqli_query ($connection, 'SET NAMES "'.DB_ENCODE.'"');

if (mysqli_connect_errno()){
    printf ('Falló conexión a la base de datos: %$\n',mysqli_connect_error());
    exit();
}

if (!function_exists('queryExecute')){
    # Funcion que retorna 1 -> OK, 0 -> NO.
    function queryExecute($sql){
        global $connection;
        $recuest=$connection->query($sql);
        return $recuest;
    }
    # Devuelve un solo registro
    function queryRowID($sql){
        global $connection;
        $query=$connection->query($sql);
        $row =$query->fetch_assoc();
        return $row;
    }
    function charSet($str){
        global $connection;
        $str = mysqli_real_escape_string($connection,trim($str));
        return htmlspecialchars($str);
    }
    
    /**
     * Method getUitimoID
     * Obtine el ultimo id que se registro
     * @param String $sql Consulta insert
     *
     * @return int Ultimo id que se inserto en la tabla
     */
    function queryExecuteGetID($sql){
        global $connection;
        $query = $connection->query($sql);
        return $connection->insert_id;
    }

}

?>