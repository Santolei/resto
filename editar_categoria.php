<?php 
// --- Controlador de sesiones ---- //
include 'inc/sessions.php';
// --- Archivos de configuración y conexión a la Base de datos ---- //
require 'config/conexion.php';

$id_categoria = $_GET['id'];

// Traigo los productos de la base de datos

$result = $con->PREPARE("
	SELECT * FROM categorias
	WHERE id_categoria = '$id_categoria'");
$result->execute();
$categoria = $result->fetch();

require 'views/editar_categoria.view.php';
?>