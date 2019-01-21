<?php 
foreach ($usuarios as $usuario) {
	if ($usuario['nombre'] = "$usuario_login" and $usuario_logueado['rol'] != 1) {
		header('Location: error.php');
	}
	break;		
}
 ?>