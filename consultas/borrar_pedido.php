<?php 

// --- Archivos de configuración y conexión a la Base de datos ---- //
require '../config/config.php';
require '../config/conexion.php';

// --------------------------------- //
// --------------------------------- //
// Traigo datos del formulario
$id_pedido = $_GET['id'];

// --------------------------------- //
// --------------------------------- //
// Borro el producto de la BD

if (!$con) {
	echo 'Fallo la conexion';
} else {
	$statement = $con->prepare("
		DELETE FROM temporal
		WHERE id
		 = '$id_pedido'
		LIMIT 1
		");

	$statement->execute();
}		
?>