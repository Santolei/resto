<?php 
	// Traigo la cantidad de mesas asignadas por el usuario.

	$statement = $con->prepare ('SELECT cantidad_mesas FROM config');
	$statement->execute();
	$cant_mesas = $statement->fetch();
	$cant_mesas = $cant_mesas[0];
 ?>