<?php 
	// --- Archivos de configuración y conexión a la Base de datos ---- //
	require 'config/config.php';
	require 'config/conexion.php';

	// --------------------------------- //
	// --------------------------------- //

	// Traigo los datos de la tabla perfil, donde figuran los datos 
	// del negocio del usuario

	require 'consultas/perfil.php';

	// Cantidad de mesas

	require 'consultas/cantidad_mesas.php';

	// --------------------------------- //
	// --------------------------------- //

	// Agrego el 'Active' en el sidebar.
	$active_configuracion="active";

	// --------------------------------- //
	// --------------------------------- //

	// Edito la cantidad de mesas que quiera mostrar el usuario

	require 'consultas/edit_cantidad_mesas.php';

	// --------------------------------- //
	// --------------------------------- //

	// Edito la info del perfil

	require 'consultas/edit_perfil.php';

	// --------------------------------- //
	// --------------------------------- //

	// -- Template del index -- //
	require 'views/configuracion.view.php';
 ?>