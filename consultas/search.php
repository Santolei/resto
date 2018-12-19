<?php 

// --- Archivos de configuración y conexión a la Base de datos ---- //
require '../config/config.php';
require '../config/conexion.php';

// --------------------------------- //
// --------------------------------- //


//Recogemos la cadena
$busqueda=$_POST['cadena'];

if (!$con) {
	echo 'Fallo la conexion';
} else {
	if (isset($busqueda) and $busqueda != "") {
		$statement = $con->prepare("SELECT * FROM productos WHERE nombre LIKE '%$busqueda%'");
		$statement->execute();
		$resultado = $statement->fetchAll();
		
		foreach($resultado as $producto){
			$id_producto = $producto['id_producto'];
			$nombre_producto = $producto['nombre'];
			$precio_producto = $producto['precio'];
			$categoria_producto = $producto['categoria'];

			echo ("
				<a class='agregar_product' data-id='$id_producto' data-nombre='$nombre_producto' data-precio='$precio_producto'>$nombre_producto</a>
				");
		}

		// print_r($resultado);


	} 
}



?>