<?php 

$id_venta = $_GET['id'];

// Traigo los productos de la base de datos

$result = $con->PREPARE("
	SELECT * FROM ventas
	WHERE id_venta = '$id_venta'");
$result->execute();
$venta = $result->fetch();

?>