<?php 

// --- Archivos de configuración y conexión a la Base de datos ---- //
require '../config/config.php';
require '../config/conexion.php';

// --------------------------------- //
// --------------------------------- //
// Traigo datos del formulario
$id_categoria = $_POST['id_categoria'];
$nombre = $_POST['nombre'];

// --------------------------------- //
// --------------------------------- //
// Inserto el nuevo producto en la BD

if (!$con) {
	echo 'Fallo la conexion';
} else {
	$statement = $con->prepare("
		UPDATE categorias
		SET nombre = '$nombre'
		WHERE id_categoria = '$id_categoria'
		");

	$statement->execute();
	header("Location: ../editar_categoria.php?id=$id_categoria");
}

		

		
?>