<?php 

// --- Archivos de configuración y conexión a la Base de datos ---- //
require '../config/config.php';
require '../config/conexion.php';

// --------------------------------- //
// --------------------------------- //
$nro_mesa = $_GET['id'];
$estado = $_POST['estado'];

if (!$con) {
	echo 'Fallo la conexion';
} else {

		// --------------------------------- //
		// Ejecuto la consulta para ver si hay datos 
		// --------------------------------- //

					$statement2 = $con->prepare("
				 		UPDATE temporal 
				 		SET estado = $estado
				 		WHERE nro_mesa = $nro_mesa 
				 		-- AND id_producto = 
			 		");
	 				$statement2->execute();
	 				echo "Funciona";
}

	// header("Location: ../mesa.php?id=$nro_mesa");
?>