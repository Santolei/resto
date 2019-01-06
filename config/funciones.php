<?php 
	// funcion para traer la cantidad de mesas que asigne el usuario.
	function traerMesas(){
		$statement = $con->prepare ('SELECT * FROM config');
		$statement->execute();
		$cant_mesas = $statement->fetch();
		print_r($cant_mesas);
	}

 ?>