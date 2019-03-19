<?php 

// --- Archivos de configuración y conexión a la Base de datos ---- //

require '../config/conexion.php';

// --------------------------------- //
// --------------------------------- //
$id = $_GET['id'];

if (!$con) {
	echo 'Fallo la conexion';
} else {

		$statement = $con->prepare("
			SELECT *
			FROM temporal
			WHERE id = $id
			");
		$statement->execute();
		$resultados = $statement->fetch();

		$cantidad = $resultados['cantidad'];
		if ($cantidad >= 0) {
			$cantidadfinal = $cantidad - 1 ;

			$precio = $resultados['precio'];

		// --------------------------------- //
		// Ejecuto la consulta para ver si hay datos 
		// --------------------------------- //

		$statement2 = $con->prepare("
	 		UPDATE temporal 
	 		SET cantidad = $cantidadfinal,
	 		total = $cantidadfinal * $precio
	 		WHERE id = $id 
 		");
		$statement2->execute();
		}
		else {
			echo "No se puede restar";
		}
		
}

	// header("Location: ../mesa.php?id=$nro_mesa");
?>