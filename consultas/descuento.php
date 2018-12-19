<?php 
	// --- Archivos de configuración y conexión a la Base de datos ---- //

	require '../config/config.php';
	require '../config/conexion.php';

	$nro_mesa = $_GET['id'];


	// --- Datos del Modal: modal_mesa.php ---- //

	if (isset($_POST['submit']) AND isset($_POST['descuento'])) {

		$descuento = $_POST['descuento'];

	// --------------------------------- //
	// Traigo la suma del total de la mesa 
	// --------------------------------- //

	$statement = $con->prepare("
		SELECT SUM(total) 
		FROM temporal 
		WHERE nro_mesa = $nro_mesa 
	");
	$statement->execute();

	$total_mesa = $statement->fetch();
	$total_mesa = $total_mesa[0];

	// --------------------------------- //
	// Inserto el descuento en la tabla
	// --------------------------------- //

	$statement2 = $con->prepare("
		UPDATE temporal 
		SET descuento = $descuento
		WHERE nro_mesa = $nro_mesa 
	");
	$statement2->execute();
	$descuento_tabla = $statement2->fetch();

	// --------------------------------- //
	// Descuento el % al total 
	// --------------------------------- //

	$total_con_descuento = ($total_mesa - ($total_mesa * $descuento) / 100);
	
	header("Location: ../ver_cuenta.php?id=$nro_mesa");
	} 

 ?>