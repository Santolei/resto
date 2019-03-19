<?php 
	require '../config/conexion.php';
	// --- Consulta de productos y categorias ---- //
	require "productos.php";
	require 'categorias.php';

	// --------------------------------- //
	// --------------------------------- //

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
		echo "<tr><td scope='row'>" . $pedido['producto']. "</td>" ;
		echo "<td class='print-derecha'>" . $pedido['cantidad'] . "</td>";
		echo "<td class='ocultar'>" . $pedido['precio'] . "</td>";
		echo "<td class='ocultar'>" . $pedido['total'] . "</td>";
		echo "<td class='ocultar text-center'>" . "<a data-toggle='modal' data-target='#modal_borrar_pedido'" . $pedido['id'] . "> <i class='fa fa-times fa-2x text-danger'></i></a>" . "</td>";
	echo "</tr>";
	echo "<?php include '../modals/modal_borrar_pedido.php'?>";
	}

// ESTO NO SIRVEEEEEEEEEEE

 ?>

 