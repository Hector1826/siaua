<?php 	
    //TODO Parametros para la conexión servidor de Base de datos y Apache

    /** 
     ** ------------------------------------------------------------------------
    **                          LOCALHOST
    ** ------------------------------------------------------------------------**/
    define('DB_HOST','localhost');   				# Dirección servidor.
    define('DB_USERNAME', 'root');                  # Usuario.
    define('DB_PASSWORD', '');                      # Contraseña.
    define('DB_NAME', 'db_siaua');                     # Nombre de la BD.
    define('DB_ENCODE', 'utf8');                    # Codificación.

    /**
     ** ------------------------------------------------------------------------
    **                         REMOTO 000WebHost
    ** ------------------------------------------------------------------------**/
    #define('DB_HOST', 'localhost');                # Dirección servidor.
    #define('DB_USERNAME', 'id19353494_dev_siaua'); # Usuario.
    #define('DB_PASSWORD', 'SIAUAsistema.2022');    # Contraseña.
    #define('DB_NAME', 'id19353494_siaua_db');      # Nombre de la BD.
    #define('DB_ENCODE', 'utf8');                   # Codificacións.
    /**
    ** ------------------------------------------------------------------------
    **                        Mensajes de respuesta
    ** ------------------------------------------------------------------------**/
    define('INSERT_SUCCESS', 'Registro exitoso');
    define('UPDATE_SUCCESS', 'Edición exitosa');
    define('DELETE_SUCCESS', 'Registro eliminado');
    define('RSPTA_FAIL', 'Ocurrio un problema, vuelve a intentarlo');
    define('DEFAULT_RSPTA', 'Espacio restringido');
    define('ENABLE_SUCCESS', 'Habilitado exitosamente');
    define('DISABLE_SUCCESS', 'Deshabilitado exitosamente');
    