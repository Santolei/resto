<?php 
	//-- Sesiones -- //
	ini_set("session.cookie_lifetime","36000");
	ini_set("session.gc_maxlifetime","36000");
	
	session_start();
	$_SESSION['rdrurl'] = $_SERVER['REQUEST_URI'];

	if (!isset($_SESSION['usuario'])) {
		header('Location: login.php');
	} else{
		$usuario_login = $_SESSION['usuario'];
	}
	// --- Archivos de configuración y conexión a la Base de datos ---- //
	
	require 'config/conexion.php';

	// --- Consulta de productos y categorias ---- //
	require 'consultas/productos.php';
	require 'consultas/categorias.php';

	// Traigo los datos de la tabla perfil, donde figuran los datos 
	// del negocio del usuario

	require 'consultas/perfil.php';

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
	require 'views/mesa2.view.php';

 ?>