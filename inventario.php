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

// Agrego el 'Active' en el sidebar.
$active_inventario="active";

// Traigo los productos de la base de datos

$result = $con->PREPARE('SELECT * FROM productos');
$result->execute();
$productos = $result->fetchAll();

// Traigo las categorías de la base de datos

$result2 = $con->PREPARE("SELECT nombre FROM categorias");
$result2->execute();
$categorias = $result2->fetchAll();

// -- Template del inventario -- //
require 'views/inventario.view.php';

 ?>