<?php 
// --- Controlador de sesiones ---- //
include 'inc/sessions.php';
// --- Archivos de configuración y conexión a la Base de datos ---- //
require 'config/conexion.php';

// Traigo los datos de la tabla perfil, donde figuran los datos 
// del negocio del usuario

require 'consultas/perfil.php';

// Voy a traer los datos de roles y usuarios

require_once 'consultas/roles.php';
require_once 'consultas/usuarios.php';

// --------------------------------- //
// --------------------------------- //

// Esta sección solo la verán los administradores

include 'inc/permisoAdmin.php';

// --------------------------------- //
// --------------------------------- //
// Voy a traer los datos de las ganancias

require_once 'consultas/ganancias.php';


// PRUEBA 



// -- Template del index -- //
require 'views/reportes.view.php';

 ?>