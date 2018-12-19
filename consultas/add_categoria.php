<?php 

// --- Archivos de configuración y conexión a la Base de datos ---- //
require '../config/config.php';
require '../config/conexion.php';


// --------------------------------- //
// --------------------------------- //
// Inserto el nuevo producto en la BD

if (!$con) {
	echo 'Fallo la conexion';
} else {
	$statement = $con->prepare("
		INSERT INTO categoria (nombre) 
		VALUES($_POST['nombre'])
		");

	$statement->execute();
	header("Location: ../inventario.php");
}

		

		
?>