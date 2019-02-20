<?php 
// --- Archivos de configuración y conexión a la Base de datos ---- //

	require '../config/config.php';
	require '../config/conexion.php';
	require '../config/funciones.php';

	$nro_mesa = $_POST['nro_mesa'];

	// --------------------------------- //
	// Sumatoria del consumo total de la mesa
	// --------------------------------- //

	$statement = $con->prepare("
		SELECT SUM(total) 
		FROM temporal 
		WHERE nro_mesa = $nro_mesa 
		");
	$statement->execute();

	$total_mesa = $statement->fetch();

	// --------------------------------- //
	// Traigo el descuento si lo hay 
	// --------------------------------- //
	$statement1 = $con->prepare("
		SELECT descuento 
		FROM temporal
		WHERE nro_mesa = $nro_mesa 
		");
	$statement1->execute();
	$descuento = $statement1->fetch();
	$descuento = $descuento[0];
	$subtotal_mesa = $total_mesa[0];
	$subtotal = ($subtotal_mesa * $descuento) / 100; 

	$total_con_descuento = ($subtotal_mesa - $subtotal);

	// --------------------------------- //
	// Traigo los productos consumidos
	// --------------------------------- //
	$prod_consumidos = $con->prepare("
		SELECT * 
		FROM temporal
		WHERE nro_mesa = $nro_mesa 
		");
	$prod_consumidos->execute();
	$productos_consumidos = $prod_consumidos->fetchAll();
	foreach ($productos_consumidos as $producto_consumido) {
		$nombreprod .= $producto_consumido['producto'] . ' x ' . $producto_consumido['cantidad'] . '<br>';
	}

	/*
	|--------------------------------------------------------------------------
	| Inserto los datos en la Caja
	|--------------------------------------------------------------------------
	*/

	$statement = $con->prepare('
		INSERT INTO caja (monto, metodo_pago, anio,mes, dia) 
		VALUES(:monto, :metodo_pago, :anio, :mes, :dia)
		');

	$statement->execute(array(
		':monto' => $_POST['monto'],
		':metodo_pago' => $_POST['metodo'],
		':anio' => date('Y'),
		':mes' => mes(),
		':dia' => date('Y-m-d')
	));

	/*
	|--------------------------------------------------------------------------
	| Inserto los datos en la tabla de ventas
	|--------------------------------------------------------------------------
	*/

	$datosventas = $con->prepare('
		INSERT INTO ventas (nro_mesa,consumo,metodo_pago,prod_consumidos) 
		VALUES(:nro_mesa, :consumo, :metodo_pago, :prod_consumidos)
		');



	$datosventas->execute(array(
		':nro_mesa' => $nro_mesa ,
		':consumo' => $_POST['monto'] ,
		':metodo_pago' => $_POST['metodo'],
		':prod_consumidos' => $nombreprod
	));

	/*
	|--------------------------------------------------------------------------
	| Borro datos de la tabla temporal
	|--------------------------------------------------------------------------
	*/

	$statement2 = $con->prepare ("
		DELETE FROM temporal
		WHERE nro_mesa = '$nro_mesa';
	");
	$statement2->execute();

	/*
	|--------------------------------------------------------------------------
	| ACTUALIZO EL ESTADO DE LA MESA
	|--------------------------------------------------------------------------
	*/

	$statement3 = $con->prepare ("
		UPDATE mesas 
		SET estado = 'Disponible'
		WHERE nro_mesa = '$nro_mesa';
	");
	$statement3->execute();
	
	header("Location: ../index.php");
	

 ?>