<?php 

// --- Archivos de configuración y conexión a la Base de datos ---- //
require '../config/conexion.php';

if (isset($_POST['desde']) and isset($_POST['hasta'])) {
	// DATOS DEL TIMEPICKER => reportes.view.php y reemplazo los / por - para que tome la fecha de la base de datos
	$desde = $_POST['desde'];
	$desde = str_replace("/", "-", $desde);
	$hasta = $_POST['hasta'];
	$hasta = str_replace("/", "-", $hasta);
	// Ahora tengo que cambiar el formato de la fecha a la version inglesa
	$dia_desde = substr($desde, -16, 2);
	$mes_desde = substr($desde, 3, 2);
	$anio_desde = substr($desde, 6, 4);
	$hora_desde = substr($desde, -5);

	$dia_hasta = substr($hasta, -16, 2);
	$mes_hasta = substr($hasta, 3, 2);
	$anio_hasta = substr($hasta, 6, 4);
	$hora_hasta = substr($hasta, -5);

	// Rearmo la fecha de inicio

	$desde = $anio_desde . "-" . $mes_desde . "-" . $dia_desde . " " . $hora_desde . ":00";
	$hasta = $anio_hasta . "-" . $mes_hasta . "-" . $dia_hasta . " " . $hora_hasta . ":00";

	// --------------------------------- //
	// TRAIGO LOS DATOS DE LAS VENTAS DE LAS FECHAS SELECCIONADAS 
	// --------------------------------- //

	$statement = $con->prepare("
		SELECT *
		FROM ventas 
		WHERE fecha 
		BETWEEN '$desde'
		AND '$hasta'
	");
	$statement->execute();
	$ventas = $statement->fetchAll();

	$statement = $con->prepare("
		SELECT sum(consumo)
		FROM ventas 
		WHERE fecha 
		BETWEEN '$desde'
		AND '$hasta'
	");
	$statement->execute();
	$consumo = $statement->fetchAll();
	$consumo = round($consumo[0][0], 2);
	echo $consumo;
	foreach ($ventas as $venta) {
		echo (
			"<tr>
			  <td scope='row'>" .  "<span class=' font-weight-bold fa-1-2x'>" . $venta['id_venta'] . "</span>". "</td>" . 
			  "<td>" . $venta['fecha'] . "</td>" . 
			  "<td>" . $venta['nro_mesa'] . "</td>" .
			  "<td>" . "$" . $venta['consumo'] ."</td>" .
			  "<td>" . "<a href='detalle_venta.php?id=".$venta['id_venta']. "'>Ver detalle</a>" ."</td>" .
			"</tr>"
		);
	}
}


 ?>