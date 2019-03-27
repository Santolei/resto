<?php 

// --- Archivos de configuración y conexión a la Base de datos ---- //
require '../config/config.php';
require '../config/conexion.php';

// --------------------------------- //
// --------------------------------- //
// Traigo datos del formulario
$id_usuario = $_GET['id'];

// --------------------------------- //
// --------------------------------- //
// Borro el usuario de la BD

if (!$con) {
	echo 'Fallo la conexion';
} else {
	$statement = $con->prepare("
		DELETE FROM usuarios
		WHERE id_usuario = '$id_usuario'
		LIMIT 1
		");

	$statement->execute();
}		
?>