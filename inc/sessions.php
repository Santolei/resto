<?php 
//-- Sesiones -- //
ini_set("session.cookie_lifetime","36000");
ini_set("session.gc_maxlifetime","36000");

session_start();
$_SESSION['rdrurl'] = $_SERVER['REQUEST_URI'];

// Licencia
// ------- Timezone -------- //
date_default_timezone_set('America/Argentina/Buenos_Aires');
$exibirModalLic = false;
$fecha_actual = strtotime(date("d-m-Y H:i:00"));
$fecha_final = strtotime("12-05-2019 09:16:00");
	
if($fecha_actual >= $fecha_final){
	// Licencia Vencida
		$exibirModalLic = true;
}
else{
	// Licencia Vigente
	$exibirModalLic = false;
}

if (!isset($_SESSION['usuario'])) {
	header('Location: login');
} else{
	$usuario_login = $_SESSION['usuario'];

	# Iniciando la variable de control que permitirá mostrar o no el modal de backup
	$exibirModal = false;
	# Verificando si existe o no la cookie
	if(!isset($_COOKIE["mostrarModal"]))
	{
		# Caso no exista la cookie entra aqui
		# Creamos la cookie con la duración que queramos
		 
		//$expirar = 3600; // muestra cada 1 hora
		//$expirar = 10800; // muestra cada 3 horas
		//$expirar = 21600; //muestra cada 6 horas
		// $expirar = 43200; //muestra cada 12 horas
		$expirar = 172800;  // muestra cada 48 horas
		setcookie('mostrarModal', 'SI', (time() + $expirar)); // mostrará cada 12 horas.
		# Ahora nuestra variable de control pasará a tener el valor TRUE (Verdadero)
		$exibirModal = true;
	}
}

?>