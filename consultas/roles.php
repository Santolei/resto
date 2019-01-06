<?php 
	// Voy a traer los datos de la tabla Mesas

	$statement = $con->prepare ('
		SELECT * FROM roles 
		ORDER BY id
		');
	$statement->execute();
	$roles = $statement->fetchAll();

	// --------------------------------- //
	// --------------------------------- //
	// funcion para cambiar los roles de numero al nombre del rol
	function roles($rol){
		switch ($rol){ 
			case 1: $rol = "Administrador"; break; 
			case 2: $rol = "Cajero"; break; 
			case 3: $rol = "Mozo/Camarero"; break; 
			case 4: $rol = "Adicionista"; break; 
			case 5: $rol = "Cocina"; break; 
		} 
		return $rol;
	}
	
 ?>