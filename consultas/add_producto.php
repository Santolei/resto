<?php 

// --- Archivos de configuración y conexión a la Base de datos ---- //
require '../config/config.php';
require '../config/conexion.php';

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
$id_actual = $last_id + 1;

// --------------------------------- //
// --------------------------------- //
// Inserto el nuevo producto en la BD

if (!$con) {
	echo 'Fallo la conexion';
} else {
	$statement = $con->prepare('
		INSERT INTO productos (nombre, precio, categoria, stock, editar) 
		VALUES(:nombre, :precio, :categoria, :stock, :editar)
		');

	$statement->execute(array(
		':nombre' => $_POST['nombre'],
		':precio' => $_POST['precio'],
		':categoria' => $_POST['categoria'],
		':stock' => $_POST['stock'],
		':editar' => $id_actual
	));
	header("Location: ../index.php?view=inventario");
}

		

		
?>

