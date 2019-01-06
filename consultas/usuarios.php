<?php

$query = $con->prepare ('SELECT * FROM usuarios');
	$query->execute();
$usuarios = $query->fetchAll();
// foreach ($list as $productos) {
// 	$data[] = array('id_producto' => $productos['id_producto'], 'nombre' => $productos['nombre'],'precio' => $productos['precio'],'categoria' => $productos['categoria'],'stock' => $productos['stock']);
// }

// return the result in json
// echo json_encode($data);
?>