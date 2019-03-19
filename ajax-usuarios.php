<?php 
	// --- Controlador de sesiones ---- //
	include 'inc/sessions.php';
	// --- Archivos de configuración y conexión a la Base de datos ---- //
	require 'config/conexion.php';

	// --------------------------------- //
	// --------------------------------- //

	// Voy a traer los datos de roles y usuarios

	require_once 'consultas/roles.php';
	require_once 'consultas/usuarios.php';

	// Esta sección solo la verán los administradores

	include 'inc/permisoAdmin.php';

	// --------------------------------- //
	// --------------------------------- //

	// Agrego el 'Active' en el sidebar.
	$active_usuarios="active";

	// --------------------------------- //
	// --------------------------------- //

	// -- Template -- //
	require 'views/usuarios-ajax.view.php';

	error_reporting(E_ALL); //Verificar si hay errores

	




 ?>