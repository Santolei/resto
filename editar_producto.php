<?php 
// --- Controlador de sesiones ---- //
include 'inc/sessions.php';
// --- Archivos de configuración y conexión a la Base de datos ---- //
require 'config/config.php';
require 'config/conexion.php';

$id_producto = $_GET['id'];

// Traigo los productos de la base de datos

$result = $con->PREPARE("
	SELECT * FROM productos
	WHERE id_producto = '$id_producto'");
$result->execute();
$producto = $result->fetch();

// Traigo las categorías de la base de datos

$result2 = $con->PREPARE("SELECT nombre FROM categorias");
$result2->execute();
$categorias = $result2->fetchAll();

require 'views/editar_producto.view.php';
?>