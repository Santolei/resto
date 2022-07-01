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
		$i = 1;
		$producto = $pedido['producto'];
		echo (
			"<tr>
		      <td scope='row'>" .  "<a class='imp-individual font-weight-bold fa-1-2x' onClick='" . "impComandaInd()' data-producto='".$pedido['producto']."'>" . $pedido['producto'] . "</a></td>" . 
		      "<td class='print-derecha sumaryrestar'>". "<a onClick='" . "restarPedido(" . $pedido['id'] . ")'>" . "<i class='fa fa-minus fa-1-5x text-danger mr-1'> </i>" . "</a>" .  "<span class='font-weight-bold fa-1-2x'>" . $pedido['cantidad'] . "</span>" . " <a class='mas' onClick='" . "sumarPedido(" . $pedido['id']. ")'><i class='fa fa-plus fa-1-5x text-success ml-1'></a>" . "</td>" . 
		      "<td class='ocultar'>" .  "<span class='font-weight-bold fa-1-2x'>" . $pedido['precio'] . "</span>". "</td>" .
		      "<td class='ocultar'>" .  "<span class='font-weight-bold fa-1-2x'>" . $pedido['total'] . "</span>". "</td>" .
		      "<td class='ocultar text-center'>" .
		      "<a class='addcomment' onClick='addComment(" . $pedido['id'] .")'" . "data-toggle='modal' data-target='#modal_add_comentario' data-id='".$pedido['id']."'  data-producto='".$pedido['producto']."'>" . "<i class='fa fa-comment-o fa-2x'></i></a></td>" .
		      "<td class='ocultar text-center'>" .
		      "<a class='borrarpedido' onClick='" . "borrarPedido(" . $pedido['id']. ")' data-id='".$pedido['id']."'>" . "<i class='fa fa-times fa-1-5x text-danger'></i></a></td>" .
		    "</tr>"
		);
		$i++;
	}
 ?>