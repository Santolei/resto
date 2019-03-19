<?php 
	// --- Archivos de configuración y conexión a la Base de datos ---- //

	require '../config/conexion.php';


	/*
	|--------------------------------------------------------------------------
	| Datos del Modal: modal_add_comment.php
	|--------------------------------------------------------------------------
	*/

	$id_producto = $_POST['id_producto'];
	$comentario = $_POST['comentarios'];
	$nro_mesa = $_POST['nro_mesa'];

	/*
	|--------------------------------------------------------------------------
	| ACTUALIZO EL ESTADO DE LA MESA EN LA TABLA
	|--------------------------------------------------------------------------
	*/
	
	$statement = $con->prepare ("
		UPDATE temporal 
		SET comentarios = '$comentario'
		WHERE nro_mesa = '$nro_mesa'
		AND id = '$id_producto';
	");
	$statement->execute();
	
 ?>