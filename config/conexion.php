<?php 

	require 'config.php';
	// Conexión a la base de datos por PDO
	try { $con = new PDO("mysql:host=localhost;dbname=$db;charset=utf8", $usuario, $pass);
	} catch (PDOException $e) {
		print "¡Error!: " . $e->getMessage() . "<br/>";
	    die();
	}

 ?>