<?php 
	// --- Archivos de configuración y conexión a la Base de datos ---- //
	require 'config/config.php';
	require 'config/conexion.php';

	// --------------------------------- //
	// --------------------------------- //

	$nro_mesa = $_GET['id'];

	// --------------------------------- //
	// Voy a ejecutar la consulta para traer los datos y mostrarlos en la tabla del
	// pedido de la mesa.
	// --------------------------------- //

	$statement2 = $con->prepare("
		SELECT * FROM temporal 
		WHERE nro_mesa = $nro_mesa 
	");
	$statement2->execute();
	$pedidos = $statement2->fetchAll();

	// --------------------------------- //
	// Sumatoria del consumo total de la mesa
	// --------------------------------- //

	$statement3 = $con->prepare("
		SELECT SUM(total) 
		FROM temporal 
		WHERE nro_mesa = $nro_mesa 
		");
	$statement3->execute();

	$total_mesa = $statement3->fetch();

	$statement4 = $con->prepare("
		SELECT ingreso
		FROM temporal 
		WHERE nro_mesa = $nro_mesa
		ORDER BY id DESC
		");
	$statement4->execute();
	$ingreso = $statement4->fetch();
	$timestamp = strtotime($ingreso[0]);
	$date = date('d-m-Y', $timestamp);
	$time = date('G.i', $timestamp);

	// --------------------------------- //
	// Template de mesa.php
	// --------------------------------- //
	require 'views/mesa.view.php';




 ?>