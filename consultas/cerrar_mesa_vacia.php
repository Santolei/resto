<?php 

// --- Archivos de configuración y conexión a la Base de datos ---- //

	require '../config/config.php';
	require '../config/conexion.php';
	require '../config/funciones.php';

	$nro_mesa = $_GET['id'];
	
	/*
	|--------------------------------------------------------------------------
	| Borro datos de la tabla temporal
	|--------------------------------------------------------------------------
	*/

	$statement2 = $con->prepare ("
		DELETE FROM temporal
		WHERE nro_mesa = '$nro_mesa';
	");
	$statement2->execute();

	/*
	|--------------------------------------------------------------------------
	| ACTUALIZO EL ESTADO DE LA MESA
	|--------------------------------------------------------------------------
	*/

	$statement3 = $con->prepare ("
		UPDATE mesas 
		SET estado = 'Disponible'
		WHERE nro_mesa = '$nro_mesa';
	");
	$statement3->execute();
	
	header("Location: ../index.php");


 ?>