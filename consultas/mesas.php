<?php 
	// Voy a traer los datos de la tabla Mesas

	$statement = $con->prepare ('
		SELECT * FROM mesas 
		ORDER BY nro_mesa
		');
	$statement->execute();
	$mesas = $statement->fetchAll();
 ?>