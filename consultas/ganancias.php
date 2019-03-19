<?php 
include 'config/funciones.php';

date_default_timezone_set('America/Argentina/Buenos_Aires');
$anio = date('Y');
$mes_actual = mes();
$dia_actual = date('Y-m-d');

// tabla de ingresos totales

$ingresos = $con->prepare("
	SELECT *  
	FROM caja");
$ingresos->execute();
$ingresos = $ingresos->fetchAll();

// Monto ingresos TOTALES

$statement = $con->prepare("
	SELECT SUM(monto) 
	FROM caja");
$statement->execute();
$ingresos_totales = $statement->fetch();
$ingresos_totales = round($ingresos_totales[0], 2);

// Monto ingresos ANUALES

$statement2 = $con->prepare("
	SELECT SUM(monto) 
	FROM caja
	WHERE anio = '$anio'
	");
$statement2->execute();
$montofinal = $statement2->fetch();
$montoanual = round($montofinal[0], 2);

// Monto ingresos Mensuales

$statement3 = $con->prepare("
	SELECT SUM(monto) 
	FROM caja
	WHERE anio = '$anio'
	AND mes = '$mes_actual'
	");
$statement3->execute();
$montofinal = $statement3->fetch();
$montomensual = round($montofinal[0], 2);

// Monto ingresos Diario

$statement4 = $con->prepare("
	SELECT SUM(monto) 
	FROM caja
	WHERE anio = '$anio'
	AND dia = '$dia_actual'
	");
$statement4->execute();
$montofinal = $statement4->fetch();
$montodiario = round($montofinal[0], 2);
 ?>