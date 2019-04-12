<?php 
if (!empty($_POST['cant_mesas'])) {
	$cantidad_mesas = $_POST['cant_mesas'];
	if ($cantidad_mesas <= 100) {
		$statement = $con->prepare("
		UPDATE config
		SET cantidad_mesas = '$cantidad_mesas';
	");
	$statement->execute();
	// $success = True;
	}
	else if($cantidad_mesas > 100){
		$errores = 'No se pueden mostrar más de 100 mesas';
	}
	
}

 ?>