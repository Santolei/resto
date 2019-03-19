<?php 
	$query = $con->prepare ('SELECT * FROM productos');
	$query->execute();
	$lista_productos = $query->fetchAll();
 ?>