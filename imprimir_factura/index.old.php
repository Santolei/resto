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
	Voy a traer el logo subido por el usuario
*/

require '../consultas/perfil.php';

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
 
/*
	Aquí, en lugar de "POS-58" (que es el nombre de mi impresora)
	escribe el nombre de la tuya. Recuerda que debes compartirla
	desde el panel de control
*/
 
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
	$logo = EscposImage::load("../../$logo", false);
    $printer->bitImage($logo);
}catch(Exception $e){/*No hacemos nada si hay error*/}
 
/*
	Ahora vamos a imprimir un encabezado
*/
$printer->text("\n");
$printer->text("$nombre_negocio" . "\n");
$printer->text("CUIT: " . "$cuit"."\n");
$printer->text("$direccion"."\n");
$printer->text("Tel: " . "$telefono"."\n");
$printer->text("$date" . "               " . "$time" . "hs" . "\n");
$printer->text("---------------------"."\n");
$printer->setJustification(Printer::JUSTIFY_LEFT);
$line = sprintf("%s %10s %15s", "CANT", "DESCRIPCION", "IMPORTE");
$printer->text("$line"  . "\n");
 
/*
	Ahora vamos a imprimir los
	productos
*/

 
# Para mostrar el total
$total = 0;
foreach ($pedidos as $pedido) {
	/*Alinear a la izquierda para la cantidad y el nombre*/
	$printer->setJustification(Printer::JUSTIFY_LEFT);
	$columna1 = str_pad($pedido['cantidad'], 2, ' ', STR_PAD_LEFT);
	$columna2 = str_pad($pedido['producto'], 2, ' ', STR_PAD_LEFT);
	$printer->text($columna1 . $columna2);
	$printer->text("\n");
}
 
/*
	Terminamos de imprimir
	los productos, ahora va el total
*/
// $printer->setJustification(Printer::JUSTIFY_CENTER);
// $printer->text("---------------------"."\n");
// $printer->setEmphasis(TRUE);
// $printer->text("Subtotal:" . "               " . "$"."$subtotal_mesa" . "\n");
// if ($descuento>0) {
// 	$printer->text("Descuento:" . "                " . "$descuento" . "%" . "\n");
// 	$printer->text("TOTAL:" . "                " . "$"."$total_con_descuento" . "\n");
// }
// else {
// 	$printer->text("TOTAL:" . "                  " . "$"."$subtotal_mesa" . "\n");
// }

// $printer->text("---------------------"."\n");
// $printer->text("**(IVA INCLUIDO EN PRECIOS)**"."\n");
// $printer->text("Comprobante no valido" . "\n" . "como factura"."\n");
// $printer->text("Gracias por su visita"."\n");
 
/*Alimentamos el papel 3 veces*/
$printer->feed(3);
 
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
?>