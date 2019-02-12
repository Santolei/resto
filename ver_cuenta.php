<?php 
// --- Controlador de sesiones ---- //
include 'inc/sessions.php';

// --- Archivos de configuración y conexión a la Base de datos ---- //
require 'config/config.php';
require 'config/conexion.php';

// --------------------------------- //
// --------------------------------- //
$nro_mesa = $_GET['id'];

if (!$con) {
	echo 'Fallo la conexion';
} else {
	
	// --------------------------------- //
	// Traigo los datos de la tabla temporal 
	// --------------------------------- //

	$statement = $con->prepare("
 		SELECT * FROM temporal 
 		WHERE nro_mesa = $nro_mesa 
 		-- AND id_producto = 
	");
	$statement->execute();
	$cuenta = $statement->fetchAll();

	// --------------------------------- //
	// Traigo la suma del total de la mesa 
	// --------------------------------- //

	$statement2 = $con->prepare("
		SELECT SUM(total) 
		FROM temporal 
		WHERE nro_mesa = $nro_mesa 
	");
	$statement2->execute();

	$total_mesa = $statement2->fetch();

	// --------------------------------- //
	// Traigo el descuento si lo hay 
	// --------------------------------- //
	
	if (!isset($cuenta[0]['descuento'])) {
		$descuento = 0;

	} else{
		$descuento = $cuenta[0]['descuento'];
	}

	$subtotal_mesa = $total_mesa[0];
	$subtotal = ($subtotal_mesa * $descuento) / 100; 

	$total_con_descuento = ($subtotal_mesa - $subtotal);
	

	// --------------------------------- //
	// Traigo la fecha y hora 
	// --------------------------------- //

	$statement3 = $con->prepare("
		SELECT ingreso
		FROM temporal 
		WHERE nro_mesa = $nro_mesa
		ORDER BY id DESC
		");
	$statement3->execute();
	$ingreso = $statement3->fetch();
	$timestamp = strtotime($ingreso[0]);
	$date = date('d-m-Y', $timestamp);
	$time = date('G.i', $timestamp);

	// --------------------------------- //
	// Traigo los datos del perfil del negocio
	// --------------------------------- //

	$statement3 = $con->prepare("
		SELECT * 
		FROM perfil
		");
	$statement3->execute();
	$perfil = $statement3->fetch();

	$nombre_negocio = $perfil['nombre_negocio'];
	$direccion = $perfil['direccion'];
	$telefono = $perfil['telefono'];
	$cuit = $perfil['cuit'];
	$web = $perfil['web'];
	$logo = $perfil['logo'];
}

	// -- Template-- //
	require 'views/ver_cuenta.view.php';
?>