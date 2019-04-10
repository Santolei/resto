<?php 

// --- Archivos de configuración y conexión a la Base de datos ---- //
require '../config/config.php';
require '../config/conexion.php';

// --------------------------------- //
// --------------------------------- //



if (!$con) {
	echo 'Fallo la conexion';
} else {

		// --------------------------------- //
		// Ejecuto la consulta 
		// --------------------------------- //
		$estado = $_POST['estado'];
		$id = $_POST['id'];
		$statement2 = $con->prepare("
	 		UPDATE temporal 
	 		SET estado = '$estado' 
	 		WHERE id = '$id'
	 		-- AND id_producto = 
 		");
			$statement2->execute();
}

	header("Location: ../index?view=pedidos");
?>