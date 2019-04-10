<?php 

	// Selecciono solo los archivos de la categoría seleccionada y que estén habilitados (habilitado = 1, deshabilitado = 0)
	$categoriaseleccionada = $categoria['nombre'];
	$query = $con->prepare ("
			SELECT * FROM productos
			WHERE categoria = '$categoriaseleccionada'
			AND estado = 1 
			ORDER BY nombre
			");
	$query->execute();
	$productos_por_cat = $query->fetchAll();
 ?>