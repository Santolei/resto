<?php
require '../config/conexion.php';
require __DIR__ . '/ticket/autoload.php'; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea
// ------- Timezone -------- //
	date_default_timezone_set('America/Argentina/Buenos_Aires');

use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

// ------- Nombre impresora -------- //
	
$nombre_impresora = "Cocina";

// Traigo el nro de mesa del id

$nro_mesa = $_GET['id'];
 
/*
	Voy a traer los datos del pedido de la tabla temporal
*/


// --------------------------------- //
	// Voy a ejecutar la consulta para traer los datos y mostrarlos en la tabla del
	// pedido de la mesa.
	// --------------------------------- //

	$statement2 = $con->prepare("
		SELECT * FROM temporal 
		WHERE nro_mesa = $nro_mesa 
		AND categoria != 'bebidas'
	");
	$statement2->execute();
	$pedidos = $statement2->fetchAll();

	// --------------------------------- //
	// Sumatoria del consumo total de la mesa
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
	$date = date('d-m-Y', $timestamp);
	$time = date('G.i', $timestamp);
 
 
$connector = new WindowsPrintConnector($nombre_impresora);
$printer = new Printer($connector);
 
 
/*
	Vamos a imprimir un logotipo
	opcional. Recuerda que esto
	no funcionará en todas las
	impresoras
 
	Pequeña nota: Es recomendable que la imagen no sea
	transparente (aunque sea png hay que quitar el canal alfa)
	y que tenga una resolución baja. En mi caso
	la imagen que uso es de 250 x 250
*/

# Vamos a alinear al centro lo próximo que imprimamos
$printer->setJustification(Printer::JUSTIFY_CENTER);
 
/*
	Cargo e imprimo el logo
*/
try{
	$logo = EscposImage::load("logojpg.jpg", false);
    $printer->bitImage($logo);
}catch(Exception $e){/*No hacemos nada si hay error*/}
 
/*
	Ahora vamos a imprimir un encabezado
*/
$printer->text("\n");
$printer->setJustification(Printer::JUSTIFY_LEFT);
$printer->text("Mozo: " . $pedidos[0]['mozo'] . "\n");
$printer->text("Mesa " . $nro_mesa . ":        " . "Ingreso: " . $time . "hs" . "\n");
$printer->setJustification(Printer::JUSTIFY_LEFT);
$printer->setUnderline(Printer::UNDERLINE_DOUBLE);
$printer->text("Cantidad/Producto" . "\n");
$printer->setUnderline(Printer::UNDERLINE_NONE);
 
/*
	Ahora vamos a imprimir los
	productos
*/

# Para mostrar el total
$total = 0;
foreach ($pedidos as $pedido) {
	/*Alinear a la izquierda para la cantidad y el nombre*/
	$printer->setJustification(Printer::JUSTIFY_LEFT);
	$printer->text($pedido['cantidad'] . " x " . $pedido['producto']  . "\n");
	$printer->setEmphasis(TRUE);
	$printer->setUnderline(Printer::UNDERLINE_DOUBLE);
	if ($pedido['comentarios']) {
		$printer->text("** " . $pedido['comentarios']. "\n");
	}
	$printer->setEmphasis(FALSE);
	$printer->setUnderline(Printer::UNDERLINE_NONE);
}
 
/*
	Terminamos de imprimir
	los productos, ahora va el total
*/
$printer->text("--------\n");


/*Alimentamos el papel 3 veces*/
$printer->feed(2);
 
/*
	Cortamos el papel. Si nuestra impresora
	no tiene soporte para ello, no generará
	ningún error
*/
$printer->cut();
 
/*
	Por medio de la impresora mandamos un pulso.
	Esto es útil cuando la tenemos conectada
	por ejemplo a un cajón
*/
$printer->pulse();
 
/*
	Para imprimir realmente, tenemos que "cerrar"
	la conexión con la impresora. Recuerda incluir esto al final de todos los archivos
*/
$printer->close();

header("Location: ../mesa.php?id=$nro_mesa");	
?>