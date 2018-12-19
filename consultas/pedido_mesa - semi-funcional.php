<?php 

// --- Archivos de configuración y conexión a la Base de datos ---- //
require '../config/config.php';
require '../config/conexion.php';

// --------------------------------- //
// --------------------------------- //

$nro_mesa = $_POST['nro_mesa'];
$producto = $_POST['producto'];
$id_producto = $_POST['id_producto'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$total = $cantidad * $precio;

if (!$con) {
	echo 'Fallo la conexion';
} else {

		// --------------------------------- //
		// Ejecuto la consulta para ver si hay datos 
		// --------------------------------- //

		$statement = $con->prepare("
			SELECT * FROM temporal 
			WHERE nro_mesa = $nro_mesa 
		");
		$statement->execute();
		$pedidos = $statement->fetchAll();

		print_r($pedidos);

		if (empty($pedidos)) {
			// --------------------------------- //
			// Si la tabla temporal está vacía => 
			// Inserto datos del pedido en la tabla temporal
			// --------------------------------- //
		
			$statement2 = $con->prepare("
				INSERT INTO temporal (nro_mesa,producto, id_producto,cantidad,precio,total) 
				VALUES (:nro_mesa, :producto, :id_producto, :cantidad, :precio, :total)
			");
				$statement2->execute(array(
					':nro_mesa' => $nro_mesa,
					':producto' => $producto,
					':id_producto' => $id_producto,
					':cantidad' => $cantidad,
					':precio' => $precio,
					':total' => $total
					));
		}
		else {
			// --------------------------------- //
			// Si no está vacía significa que ya hay un pedido en curso.
			// Voy a revisar si se repite un producto, en ese caso voy a 
			// sumar el producto en la fila actual en vez de crear otra fila.
			// --------------------------------- //

			// Recorro el array buscando si hay productos iguales

			foreach ($pedidos as $pedido) {
				$nueva_cantidad = $pedido['cantidad'];
				$nuevo_producto = $pedido['producto'];
				$nuevo_id_producto = $pedido['id_producto'];
				$nuevo_total = $pedido['total'];

				if ($nuevo_id_producto === $id_producto) {
					echo "Ya existe ese producto";
					print_r($nuevo_id_producto);
					// Si lo encuentra entonces actualizo la cantidad
					// de productos en la tabla

					$statement3 = $con->prepare("
				 		UPDATE temporal 
				 		SET cantidad = $nueva_cantidad + $cantidad,
				 			total = $nuevo_total + $total
				 		WHERE nro_mesa = $nro_mesa AND $nuevo_id_producto = $id_producto
			 		");
	 				$statement3->execute();
				}
			} // FIN FOREACH

				if ($nuevo_id_producto != $id_producto) {
					$statement4 = $con->prepare("
						INSERT INTO temporal (nro_mesa,producto,id_producto,cantidad,precio,total) 
						VALUES (:nro_mesa, :producto, :id_producto, :cantidad, :precio, :total)
					");
						$statement4->execute(array(
							':nro_mesa' => $nro_mesa,
							':producto' => $producto,
							':id_producto' => $id_producto,
							':cantidad' => $cantidad,
							':precio' => $precio,
							':total' => $total
							));
				}
		}

	
}
	// header("Location: ../mesa.php?id=$nro_mesa");
?>