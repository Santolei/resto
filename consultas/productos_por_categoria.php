<?php 
	$categoriaseleccionada = $categoria['nombre'];
	$query = $con->prepare ("
			SELECT * FROM productos
			WHERE categoria = '$categoriaseleccionada'
			ORDER BY nombre
			");
	$query->execute();
	$productos_por_cat = $query->fetchAll();
 ?>