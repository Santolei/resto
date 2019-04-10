<?php 

// --- Archivos de configuración y conexión a la Base de datos ---- //
require '../config/config.php';
require '../config/conexion.php';

// --------------------------------- //
// --------------------------------- //
// Traigo datos del formulario
$id_producto = $_GET['id'];

// --------------------------------- //
// --------------------------------- //
// Borro el producto de la BD

if (!$con) {
	echo 'Fallo la conexion';
} else {
	$statement = $con->prepare("
		DELETE FROM productos
		WHERE id_producto = '$id_producto'
		LIMIT 1
	");

	$statement->execute();
	header("Location: ../index?view=inventario");
}		
?>