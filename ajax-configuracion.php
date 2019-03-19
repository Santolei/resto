<?php 
    // --- Controlador de sesiones ---- //
    include 'inc/sessions.php';
    // --- Archivos de configuración y conexión a la Base de datos ---- //
    require 'config/conexion.php';

    // --------------------------------- //
    // --------------------------------- //

    // Traigo los datos de la tabla perfil, donde figuran los datos 
    // del negocio del usuario

    require 'consultas/perfil.php';

    // Cantidad de mesas

    require 'consultas/cantidad_mesas.php';

    // --------------------------------- //
    // --------------------------------- //

    // Agrego el 'Active' en el sidebar.
    $active_configuracion="active";

    // --------------------------------- //
    // --------------------------------- //

    // Voy a traer los datos de roles y usuarios

    require_once 'consultas/roles.php';
    require_once 'consultas/usuarios.php';  

    // Esta sección solo la verán los administradores

    include 'inc/permisoAdmin.php';

    // Edito la cantidad de mesas que quiera mostrar el usuario

    require 'consultas/edit_cantidad_mesas.php';

    // --------------------------------- //
    // --------------------------------- //

    // Edito la info del perfil

    require 'consultas/edit_perfil.php';

    // --------------------------------- //
    // --------------------------------- //

    // -- Template del index -- //
    require 'views/configuracion-ajax.view.php';
 ?>
 