<?php 
// --- Controlador de sesiones ---- //
include 'inc/sessions.php';
// --- Archivos de configuración y conexión a la Base de datos ---- //

require 'config/conexion.php';

// --------------------------------- //
// --------------------------------- //

// Voy a traer los datos de la tabla Mesas

require_once 'consultas/mesas.php';
require_once 'consultas/cantidad_mesas.php';
error_reporting(E_ALL); //Verificar si hay errores

// --------------------------------- //
// --------------------------------- //

// Agrego el 'Active' en el sidebar.
$active_index="active";

// --------------------------------- //
// --------------------------------- //

// Muestro la cantidad de mesas definidas por el usuario
$mesas = array_slice($mesas, 0, $cant_mesas);

// Inventario

$result = $con->PREPARE('SELECT * FROM productos');
$result->execute();
$productos = $result->fetchAll();

// Traigo las categorías de la base de datos

$result2 = $con->PREPARE("SELECT nombre FROM categorias");
$result2->execute();
$categorias = $result2->fetchAll();

// CAJA

// Voy a traer los datos de roles y usuarios

// require_once 'consultas/roles.php';
// require_once 'consultas/usuarios.php';

// --------------------------------- //
// --------------------------------- //
// Voy a traer los datos de las ganancias

require_once 'consultas/ganancias.php';

// Voy a traer los datos de los pedidos

require_once 'consultas/pedidos.php';

// CONFIGURACION

// Traigo los datos de la tabla perfil, donde figuran los datos 
// del negocio del usuario

require 'consultas/perfil.php';

// --------------------------------- //
// --------------------------------- //

// Edito la cantidad de mesas que quiera mostrar el usuario

require 'consultas/edit_cantidad_mesas.php';

// --------------------------------- //
// --------------------------------- //

// Edito la info del perfil

require 'consultas/edit_perfil.php';

// Traigo usuarios

require 'consultas/usuarios.php';

// -- Template del index -- //
require 'views/index.view.php';


 ?>