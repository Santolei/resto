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
	$statement = $con->prepare('
		INSERT INTO productos (nombre, precio, categoria, stock) 
		VALUES(:nombre, :precio, :categoria, :stock)
		');

	$statement->execute(array(
		':nombre' => $_POST['nombre'],
		':precio' => $_POST['precio'],
		':categoria' => $_POST['categoria'],
		':stock' => $_POST['stock']
	));
	header("Location: ../inventario.php");
}

		

		
?>

