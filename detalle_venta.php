<?php 
// --- Controlador de sesiones ---- //
include 'inc/sessions.php';
// --- Archivos de configuración y conexión a la Base de datos ---- //
require 'config/config.php';
require 'config/conexion.php';

// --------------------------------- //
// --------------------------------- //

// Voy a traer los datos de roles y usuarios

require_once 'consultas/roles.php';
require_once 'consultas/usuarios.php';

// --------------------------------- //
// --------------------------------- //

// Esta sección solo la verán los administradores

include 'inc/permisoAdmin.php';

// --------------------------------- //
// --------------------------------- //
// Voy a traer los datos de la venta

require_once 'consultas/ventas.php';

// -- Template-- //
require 'views/detalle_venta.view.php';




 ?>