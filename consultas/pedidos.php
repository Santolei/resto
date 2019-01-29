<?php

// pedidos traidos de la tabla "temporal"

	$statement = $con->prepare ('
		SELECT * FROM temporal 
		ORDER BY nro_mesa,
		estado DESC,
		ingreso DESC
		');
	$statement->execute();
	$pedidos = $statement->fetchAll();
 ?>