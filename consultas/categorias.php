<?php 
	$query = $con->prepare ('SELECT * FROM categorias');
	$query->execute();
	$lista_categorias = $query->fetchAll();
 ?>