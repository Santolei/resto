<?php

$query = $con->prepare ('SELECT * FROM usuarios');
	$query->execute();
$usuarios = $query->fetchAll();

$query2 = $con->prepare("
SELECT * FROM usuarios
WHERE nombre = '$usuario_login' 
");
$query2->execute();
$usuario_logueado = $query2->fetch();
// foreach ($list as $productos) {
// 	$data[] = array('id_producto' => $productos['id_producto'], 'nombre' => $productos['nombre'],'precio' => $productos['precio'],'categoria' => $productos['categoria'],'stock' => $productos['stock']);
// }

// return the result in json
// echo json_encode($data);
?>