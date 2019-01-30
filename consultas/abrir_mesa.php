<?php 
	// --- Archivos de configuración y conexión a la Base de datos ---- //

	require '../config/config.php';
	require '../config/conexion.php';


	// --- Datos del Modal: modal_mesa.php ---- //

	if (isset($_POST['submit']) AND isset($_POST['abrirMesa'])) {
		$ocupada = $_POST['abrirMesa'];
		$nro_mesa = $_POST['nro_mesa'];
		/*
		|--------------------------------------------------------------------------
		| ACTUALIZO EL ESTADO DE LA MESA EN LA TABLA
		|--------------------------------------------------------------------------
		*/
		$statement = $con->prepare ("
			UPDATE mesas 
			SET estado = '$ocupada'
			WHERE nro_mesa = '$nro_mesa';
		");
		$statement->execute();
		header("Location: ../mesa.php?id=$nro_mesa");
	} else if(isset($_POST['submit']) AND isset($_POST['cerrarMesa'])){
		$disponible = $_POST['cerrarMesa'];
		$nro_mesa = $_POST['nro_mesa'];
		
		/*
		|--------------------------------------------------------------------------
		| BORRO LOS PEDIDOS DE LA TABLA TEMPORAL
		|--------------------------------------------------------------------------
		*/

		$statement = $con->prepare ("
			DELETE FROM temporal
			WHERE nro_mesa = '$nro_mesa';
		");
		$statement->execute();

		/*
		|--------------------------------------------------------------------------
		| ACTUALIZO EL ESTADO DE LA MESA
		|--------------------------------------------------------------------------
		*/

		$statement2 = $con->prepare ("
			UPDATE mesas 
			SET estado = '$disponible'
			WHERE nro_mesa = '$nro_mesa';
		");
		$statement2->execute();
		
		header("Location: ../index.php");
	}

	else {
		header("Location: ../index.php");
	}
	

 ?>