<?php
require 'config/conexion.php';
require 'consultas/perfil.php';

// --------------------------------- //
	// Voy a ejecutar la consulta para traer los datos y mostrarlos en la tabla del
	// pedido de la mesa.
	// --------------------------------- //
$nro_mesa = 2;

	$statement2 = $con->prepare("
		SELECT * FROM temporal 
		WHERE nro_mesa = $nro_mesa 
	");
	$statement2->execute();
	$pedidos = $statement2->fetchAll();

	// --------------------------------- //
	// Sumatoria del consumo total de la mesa
	// --------------------------------- //

	$statement3 = $con->prepare("
		SELECT SUM(total) 
		FROM temporal 
		WHERE nro_mesa = $nro_mesa 
		");
	$statement3->execute();

	$total_mesa = $statement3->fetch();

	// --------------------------------- //
	// Traigo el descuento si lo hay 
	// --------------------------------- //
	
	if (!isset($pedidos[0]['descuento'])) {
		$descuento = 0;

	} else{
		$descuento = $pedidos[0]['descuento'];
	}

	$subtotal_mesa = $total_mesa[0];
	$subtotal = ($subtotal_mesa * $descuento) / 100; 

	$total_con_descuento = ($subtotal_mesa - $subtotal);

	// --------------------------------- //
	// Traigo la hora
	// --------------------------------- //

	$statement4 = $con->prepare("
		SELECT ingreso
		FROM temporal 
		WHERE nro_mesa = $nro_mesa
		ORDER BY id DESC
		");
	$statement4->execute();
	$ingreso = $statement4->fetch();
	$timestamp = strtotime($ingreso[0]);
	$date = date('d-m-Y');
	$time = date('G.i');
$line = sprintf("%s %10s %15s", "CANT", "DESCRIPCION", "IMPORTE");
	echo $line;
	print("<br>");
foreach ($pedidos as $pedido) {
	$line2 = sprintf("%s %s %10s %0.2f", $pedido['cantidad'], " ",  $pedido['producto'], $pedido['total']);
	print ($line2);
	print("<br>");
}


$s = 'mono';
$t = 'varios monos';

printf("[%s]\n",      $s); // salida de cadena estándar
print("<br>");
printf("[%10s]\n",    $s); // alineación a derecha con espacios
print("<br>");
printf("[%-10s]\n",   $s); // alineación a izquierda con espacios
print("<br>");
printf("[%010s]\n",   $s); // el relleno con ceros funciona con cadenas también
print("<br>");
printf("[%'#10s]\n",  $s); // usar el caracter de relleno '#'
print("<br>");
printf("[%10.10s]\n", $t); // alineación a izquierda pero con un corte de 10 caracteres

echo str_pad($pedido['producto'], 2, ' ', STR_PAD_LEFT);


?>