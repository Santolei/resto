<?php 
	// --- Controlador de sesiones ---- //
	include 'inc/sessions.php';
	// --- Archivos de configuración y conexión a la Base de datos ---- //
	require 'config/conexion.php';

	// Traigo los datos de la tabla perfil, donde figuran los datos 
	// del negocio del usuario

	require 'consultas/perfil.php';

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