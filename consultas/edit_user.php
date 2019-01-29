<?php 

// --- Archivos de configuración y conexión a la Base de datos ---- //
require '../config/config.php';
require '../config/conexion.php';

// --------------------------------- //
// --------------------------------- //
// Traigo datos del formulario -> modals/modal_edit_user.php
$id_usuario = $_POST['id_usuario'];
$nombre = $_POST['editNombre'];
$rol = $_POST['rol'];

// --------------------------------- //
// --------------------------------- //
// Inserto el nuevo producto en la BD

if (!$con) {
	echo 'Fallo la conexion';
} else {
	$statement = $con->prepare("
		UPDATE usuarios
		SET nombre = '$nombre',
			rol = '$rol'
		WHERE id_usuario = '$id_usuario'
		");

	$statement->execute();
	header("Location: ../usuarios.php");
}
		
?>