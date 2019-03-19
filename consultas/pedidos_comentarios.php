<?php 
 require '../config/conexion.php';

 	$nro_mesa = $_GET['id'];

	// --------------------------------- //
	// Voy a ejecutar la consulta para traer los datos y mostrarlos en la tabla del
	// pedido de la mesa.
	// --------------------------------- //

	$statement2 = $con->prepare("
		SELECT * FROM temporal 
		WHERE nro_mesa = $nro_mesa 
	");
	$statement2->execute();
	$pedidos = $statement2->fetchAll();

	foreach ($pedidos as $pedido) {
		if ($pedido['comentarios'] ) {
			echo (
			    "<div><strong>" . $pedido['producto'] . "</strong></div>" .
	            "<div class='comentario-comanda'><p>" . $pedido['comentarios'] . "</p></div>"
			);
		}
		
	}
 ?>