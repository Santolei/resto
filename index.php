<?php 
// --- Controlador de sesiones ---- //
include 'inc/sessions.php';
// --- Archivos de configuración y conexión a la Base de datos ---- //
require 'config/config.php';
require 'config/conexion.php';

// --------------------------------- //
// --------------------------------- //

// Voy a traer los datos de la tabla Mesas

require_once 'consultas/mesas.php';
require_once 'consultas/cantidad_mesas.php';
error_reporting(E_ALL); //Verificar si hay errores

// --------------------------------- //
// --------------------------------- //

// Agrego el 'Active' en el sidebar.
$active_index="active";

// --------------------------------- //
// --------------------------------- //

// Muestro la cantidad de mesas definidas por el usuario
$mesas = array_slice($mesas, 0, $cant_mesas);

// -- Template del index -- //
require 'views/index.view.php';




 ?>