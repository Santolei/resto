<?php 

// --- Archivos de configuración y conexión a la Base de datos ---- //
require '../config/config.php';
require '../config/conexion.php';


// --------------------------------- //
// --------------------------------- //
// VARIABLES
$errores = '';

if (!$con) {
	echo 'Fallo la conexion';
} else {
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$password = hash('sha512', $password);
	$password2 = hash('sha512', $password2);

	if ( $password != $password2) {
		# Si las contraseñas son diferentes:
		$errores .= "<li>Las contraseñas no son iguales <i class='fa fa-meh-o mr-1'></i></li>";
	} else {
		// --------------------------------- //
		// --------------------------------- //
		// Inserto el nuevo usuario en la BD

		$statement = $con->prepare('
		INSERT INTO usuarios (nombre, rol, password) 
		VALUES(:nombre, :rol, :password)
		');

		$statement->execute(array(
			':nombre' => $_POST['nombre'],
			':rol' => $_POST['rol'],
			':password' => $password
		));

		header("Location: ../usuarios.php");
	}
	
}

		

		
?>