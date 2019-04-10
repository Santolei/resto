<?php 

// --- Archivos de configuración y conexión a la Base de datos ---- //
require '../config/config.php';
require '../config/conexion.php';

// --------------------------------- //
// --------------------------------- //
// Traigo datos del formulario
$id_producto = $_POST['id_producto'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];
$stock = $_POST['stock'];
$estado = $_POST['estado'];

// --------------------------------- //
// --------------------------------- //
// Inserto el nuevo producto en la BD

if (!$con) {
	echo 'Fallo la conexion';
} else {
	$statement = $con->prepare("
		UPDATE productos
		SET nombre = '$nombre',
			precio = '$precio',
			categoria = '$categoria',
			stock = '$stock',
			estado = '$estado'
		WHERE id_producto = '$id_producto'
		");

	$statement->execute();
	header("Location: ../editar_producto.php?id=$id_producto");
}

		

		
?>