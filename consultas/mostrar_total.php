<?php 
 require '../config/conexion.php';

 	$nro_mesa = $_GET['id'];

	// --------------------------------- //
	// Voy a ejecutar la consulta para traer los datos y mostrarlos en la tabla del
	// pedido de la mesa.
	// --------------------------------- //

	$statement2 = $con->prepare("
		SELECT SUM(total) 
		FROM temporal 
		WHERE nro_mesa = $nro_mesa 
		");
	$statement2->execute();
	$total = $statement2->fetch();


	echo ( "$" . $total[0]);
