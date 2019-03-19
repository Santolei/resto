<?php 

// --- Archivos de configuración y conexión a la Base de datos ---- //
require '../config/config.php';
require '../config/conexion.php';

// --------------------------------- //
// --------------------------------- //
$mozo = $_POST['mozo'];;
$nro_mesa = $_POST['nro_mesa'];
$producto = $_POST['producto'];
$id_producto = $_POST['id_producto'];
$categoria = $_POST['categoria'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$comentarios = $_POST['comentarios'];
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

		if ($pedidos) {

			// --------------------------------- //
			// Si ya hay pedidos
			// Voy a revisar si se repite un producto, en ese caso voy a 
			// sumar el producto en la fila actual en vez de crear otra fila.
			// --------------------------------- //

			// Recorro el array buscando si hay productos iguales
			$contador = 0;
			foreach ($pedidos as $pedido) {
				$nueva_cantidad = $pedido['cantidad'];
				$nuevo_producto = $pedido['producto'];
				$id_producto_tabla = $pedido['id_producto'];
				$nuevo_total = $pedido['total'];
				$comentarios_tabla = $pedido['comentarios'];

				if ($id_producto_tabla === $id_producto) {
					
					// Si lo encuentra entonces actualizo la cantidad
					// de productos en la tabla

					$statement2 = $con->prepare("
				 		UPDATE temporal 
				 		SET cantidad = $nueva_cantidad + $cantidad,
				 			total = $nuevo_total + $total
				 		WHERE nro_mesa = $nro_mesa AND id_producto = $id_producto
			 		");
	 				$statement2->execute();
	 				if ($contador > 0) {
							$delete = $con->prepare("
							DELETE FROM temporal order by id desc limit 1
								");
							$delete->execute();
						}
	 				echo("Se ejecutó statement 2" . " - Vueltas: " . $contador);
				}


				if ($id_producto_tabla !== $id_producto){

					// Si no hay ningun producto similar 
					// inserto una nueva fila
					// PROBLEMATICO
					$statement3 = $con->prepare("
						INSERT INTO temporal (nro_mesa,producto, id_producto, categoria,cantidad,precio,total, comentarios, mozo) 
						VALUES (:nro_mesa, :producto, :id_producto, :categoria, :cantidad, :precio, :total, :comentarios, :mozo)
						
						");
						$statement3->execute(array(
							':nro_mesa' => $nro_mesa,
							':producto' => $producto,
							':id_producto' => $id_producto,
							':categoria' => $categoria,
							':cantidad' => $cantidad,
							':precio' => $precio,
							':total' => $total,
							':comentarios' => $comentarios,
							':mozo' => $mozo
						));
						if ($contador > 0) {
							$delete = $con->prepare("
							DELETE FROM temporal order by id desc limit 1
								");
							$delete->execute();
						}
						
						echo("Se ejecutó statement 3" . " - Vueltas: " . $contador);
				}

				
				$contador++;
			} // FIN FOREACH
			
		}
		else {
				// --------------------------------- //
				// Si no hay pedidos todavia => 
				// Inserto datos del pedido en la tabla temporal
				// --------------------------------- //

				// ESTA PARTE ESTA BIEN
			
				$statement4 = $con->prepare("
					INSERT INTO temporal (nro_mesa,producto,id_producto,categoria,cantidad,precio,total, comentarios, mozo) 
					VALUES (:nro_mesa, :producto, :id_producto, :categoria, :cantidad, :precio, :total, :comentarios, :mozo)
				");
					$statement4->execute(array(
						':nro_mesa' => $nro_mesa,
						':producto' => $producto,
						':id_producto' => $id_producto,
						':categoria' => $categoria,
						':cantidad' => $cantidad,
						':precio' => $precio,
						':total' => $total,
						':comentarios' => $comentarios,
						':mozo' => $mozo
					));
					echo("Se ejecutó statement 4");
		}
					
}
	header("Location: ../mesa.php?id=$nro_mesa");
?>

