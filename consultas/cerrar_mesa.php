<?php 
// --- Archivos de configuración y conexión a la Base de datos ---- //

	require '../config/config.php';
	require '../config/conexion.php';

	$nro_mesa = $_GET['id'];

	/*
	|--------------------------------------------------------------------------
	| BORRO LOS PEDIDOS DE LA TABLA TEMPORAL
	|--------------------------------------------------------------------------
	*/

	// --------------------------------- //
	// Sumatoria del consumo total de la mesa
	// --------------------------------- //

	$statement = $con->prepare("
		SELECT SUM(total) 
		FROM temporal 
		WHERE nro_mesa = $nro_mesa 
		");
	$statement->execute();

	$total_mesa = $statement->fetch();

	// --------------------------------- //
	// Traigo el descuento si lo hay 
	// --------------------------------- //
	$statement1 = $con->prepare("
		SELECT descuento 
		FROM temporal
		WHERE nro_mesa = $nro_mesa 
		");
	$statement1->execute();
	$descuento = $statement1->fetch();
	$descuento = $descuento[0];
	$subtotal_mesa = $total_mesa[0];
	$subtotal = ($subtotal_mesa * $descuento) / 100; 

	$total_con_descuento = ($subtotal_mesa - $subtotal);

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