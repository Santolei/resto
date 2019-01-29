<?php 
	// --- Controlador de sesiones ---- //
	include 'inc/sessions.php';
	// --- Archivos de configuración y conexión a la Base de datos ---- //
	require 'config/config.php';
	require 'config/conexion.php';

	// --------------------------------- //
	// --------------------------------- //

	// Voy a traer los datos de los pedidos

	require_once 'consultas/pedidos.php';

	// --------------------------------- //
	// --------------------------------- //

	// Agrego el 'Active' en el sidebar.
	$active_pedidos="active";

	// --------------------------------- //
	// --------------------------------- //

	// -- Template -- //
	require 'views/pedidos.view.php';

	error_reporting(E_ALL); //Verificar si hay errores

	




 ?>