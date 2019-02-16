<?php 
// --- Controlador de sesiones ---- //
include 'inc/sessions.php';
// --- Archivos de configuración y conexión a la Base de datos ---- //
require 'config/config.php';
require 'config/conexion.php';

// --------------------------------- //
// --------------------------------- //

// Traigo las categorías de la base de datos

$result = $con->PREPARE("SELECT * FROM categorias");
$result->execute();
$categorias = $result->fetchAll();

// -- Template de categorias -- //
require 'views/categorias.view.php';

 ?>