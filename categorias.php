<?php 
// --- Controlador de sesiones ---- //
include 'inc/sessions.php';
// --- Archivos de configuración y conexión a la Base de datos ---- //
require 'config/conexion.php';

// Traigo los datos de la tabla perfil, donde figuran los datos 
// del negocio del usuario

require 'consultas/perfil.php';

// --------------------------------- //
// --------------------------------- //

// Traigo las categorías de la base de datos

$result = $con->PREPARE("SELECT * FROM categorias");
$result->execute();
$categorias = $result->fetchAll();

// -- Template de categorias -- //
require 'views/categorias.view.php';

 ?>