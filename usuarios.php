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
	require 'config/config.php';
	require 'config/conexion.php';

	// --------------------------------- //
	// --------------------------------- //

	// Voy a traer los datos de roles y usuarios

	require_once 'consultas/roles.php';
	require_once 'consultas/usuarios.php';
	error_reporting(E_ALL); //Verificar si hay errores

	// --------------------------------- //
	// --------------------------------- //

	// Agrego el 'Active' en el sidebar.
	$active_usuarios="active";

	// --------------------------------- //
	// --------------------------------- //

	// -- Template -- //
	require 'views/usuarios.view.php';




 ?>