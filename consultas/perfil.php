<?php 
	// Voy a traer los datos de la tabla Mesas

	$statement = $con->prepare ('
		SELECT * FROM perfil');
	$statement->execute();
	$perfil = $statement->fetch();

	$nombre_negocio = $perfil['nombre_negocio'];
	$direccion = $perfil['direccion'];
	$telefono = $perfil['telefono'];
	$cuit = $perfil['cuit'];
	$web = $perfil['web'];
	$logo = $perfil['logo'];

 ?>