<?php 
	// --- Archivos de configuración y conexión a la Base de datos ---- //

	require '../config/config.php';
	require '../config/conexion.php';


	// --- Datos del Modal: modal_mesa.php ---- //

	if (isset($_POST['submit'])) {
		$nro_mesa = $_POST['nro_mesa'];
		/*
		|--------------------------------------------------------------------------
		| ACTUALIZO EL ESTADO DE LA MESA EN LA TABLA
		|--------------------------------------------------------------------------
		*/
		$statement = $con->prepare ("
			UPDATE mesas 
			SET estado = 'Ocupada'
			WHERE nro_mesa = '$nro_mesa';
		");
		$statement->execute();
		header("Location: ../mesa.php?id=$nro_mesa");
	}

	else {
		header("Location: ../index.php");
	}
	

 ?>