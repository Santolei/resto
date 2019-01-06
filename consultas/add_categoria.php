<?php 

// --- Archivos de configuración y conexión a la Base de datos ---- //
require '../config/config.php';
require '../config/conexion.php';

// --------------------------------- //
// --------------------------------- //
// Inserto el nuevo producto en la BD

$nombre = $_POST['nombre_categoria'];

if (!$con) {
	echo 'Fallo la conexion';
} else {
	$statement = $con->prepare("
		INSERT INTO categorias(nombre) 
		VALUES('$nombre')
		");

	$statement->execute();
	header("Location: ../inventario.php");
}

		

		
?>