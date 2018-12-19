<?php 
	// --- Archivos de configuración y conexión a la Base de datos ---- //
	require 'config/config.php';
	require 'config/conexion.php';

	// --------------------------------- //
	// --------------------------------- //

	// Alguna consulta que tenga que hacer

	require 'consultas/cantidad_mesas.php';

	// --------------------------------- //
	// --------------------------------- //

	// Agrego el 'Active' en el sidebar.
	$active_configuracion="active";

	// --------------------------------- //
	// --------------------------------- //

	// Edito la cantidad de mesas que quiera mostrar el usuario

	if (isset ($_POST['cant_mesas'])) {
		$cantidad_mesas = $_POST['cant_mesas'];
		if ($cantidad_mesas <= 30) {
			$statement = $con->prepare("
			UPDATE config
			SET cantidad_mesas = $cantidad_mesas;
		");
		$statement->execute();
		$success = True;
		}
		else {
			$errores = 'No se pueden mostrar más de 30 mesas';
		}
		
	}

 ?>