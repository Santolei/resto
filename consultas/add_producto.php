<?php 

// --- Archivos de configuración y conexión a la Base de datos ---- //
require '../config/config.php';
require '../config/conexion.php';


// --------------------------------- //
// --------------------------------- //
// Inserto el nuevo producto en la BD

if (!$con) {
	echo 'Fallo la conexion';
} else {
	$statement = $con->prepare('
		INSERT INTO productos (nombre, precio, categoria, stock
		) 
		VALUES(:nombre, :precio, :categoria, :stock
		)
		');

	$statement->execute(array(
		':nombre' => $_POST['nombre'],
		':precio' => $_POST['precio'],
		':categoria' => $_POST['categoria'],
		':stock' => $_POST['stock']
	));

	// --------------------------------- //
	// --------------------------------- //
	// Reviso cual es el ultimo Id


	$id = $con->prepare('
		SELECT id_producto 
		FROM productos
		ORDER BY id_producto DESC
		LIMIT 1
		');
		$id->execute();
		$last_id = $id->fetch();

	$last_id = $last_id['id_producto'];

	$statement = $con->prepare("
		UPDATE productos
		SET editar = '$last_id',
			borrar = '$last_id'
		WHERE id_producto = '$last_id'
		");
	$statement->execute();

	header("Location: ../index?view=inventario");
}
		
?>

