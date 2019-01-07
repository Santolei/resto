<?php 
//-- Sesiones -- //
ini_set("session.cookie_lifetime","36000");
ini_set("session.gc_maxlifetime","36000");

session_start();
$_SESSION['rdrurl'] = $_SERVER['REQUEST_URI'];

if (!isset($_SESSION['usuario'])) {
	header('Location: login.php');
} else{
	$usuario_login = $_SESSION['usuario'];
}
 ?>