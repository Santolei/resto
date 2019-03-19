<?php 
	ini_set("session.cookie_lifetime","36000");
	ini_set("session.gc_maxlifetime","36000");
	session_start();

	if (isset($_SESSION['usuario'])) {
	header('Location: index.php');
	}	

	// --- Archivos de configuración y conexión a la Base de datos ---- //
	require 'config/conexion.php';

	// --------------------------------- //
	// --------------------------------- //

	$errores = '';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$user = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
		$password = $_POST['password'];
		$password = hash('sha512', $password);

		$statement = $con->prepare('
			SELECT * FROM usuarios 
			WHERE nombre = :user 
			AND password = :password'
		);
		$statement->execute(array(
			':user' => $user,
			':password' => $password 
		));

		$resultado = $statement->fetch();
		if ($resultado !== false) {
			if(isset($_SESSION['rdrurl'])){
				$_SESSION['usuario'] = $user;
				header('location: '.$_SESSION['rdrurl']);
			} else{
				$_SESSION['usuario'] = $user;
				header('Location: index.php');
			}
			
		} else {
			$errores .= '<strong class="d-flex align-items-center justify-content-center"><i class="fa fa-times fa-2x animated rotateIn slow mr-2"></i>Datos Incorrectos </strong>';
		}

	}

	// --------------------------------- //
	// --------------------------------- //

	// -- Template -- //
	require 'views/login.view.php';




 ?>
