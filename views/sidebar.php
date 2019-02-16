<?php 

// Voy a traer los datos de roles y usuarios
    require_once 'consultas/roles.php';
    require_once 'consultas/usuarios.php';

 ?>

<div class="sidebar-fixed position-fixed animated">
    <a class="logo-wrapper waves-effect" href="index.php">
        <img src="public/img/logo.png" class="img-fluid" alt="">
    </a>

    <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item list-group-item-action waves-effect <?php if (isset($active_index)){echo $active_index;}?>">
            <i class="fa fa-pie-chart mr-3"></i>Mesas
        </a>
        <!-- Muestro esta parte del menu al administrador  -->
        <?php if ($usuario_logueado['rol'] != 1): ?>
        <?php else: ?>
            <a href="inventario.php" class="list-group-item list-group-item-action waves-effect <?php if (isset($active_inventario)){echo $active_inventario;}?>">
                <i class="fa fa-table mr-3"></i>Inventario 
            </a>
        <?php endif ?>
        <!-- Muestro esta parte del menu al administrador o al cajero -->
        <?php if ($usuario_logueado['rol'] != 1): ?> 
            
        <?php else: ?>
            <a href="caja.php" class="list-group-item list-group-item-action waves-effect <?php if (isset($active_caja)){echo $active_caja;}?>">
                <i class="fa fa-money mr-3"></i>Caja
            </a>
        <?php endif ?>

        <?php if ($usuario_logueado['rol'] != 1): ?> 
        <?php else: ?>
            <a href="usuarios.php" class="list-group-item list-group-item-action waves-effect <?php if (isset($active_usuarios)){echo $active_usuarios;}?>">
                <i class="fa fa-user mr-3"></i>usuarios
            </a>
        <?php endif ?>      
        
        
        <a href="pedidos.php" class="list-group-item list-group-item-action waves-effect <?php if (isset($active_pedidos)){echo $active_pedidos;}?>">
            <i class="fa fa-pencil mr-3"></i>Pedidos
        </a>

        <?php if ($usuario_logueado['rol'] != 1): ?> 
        <?php else: ?>
            <a href="configuracion.php" class="list-group-item list-group-item-action waves-effect <?php if (isset($active_configuracion)){echo $active_configuracion;}?>">
            <i class="fa fa-cog mr-3"></i>Configuración
        </a>
        <?php endif ?>  

        <a class="list-group-item list-group-item-action waves-effect" href="logout.php"><i class="fa fa-sign-out mr-3"></i>Salir</a>
        
        <ul>
            <!-- <li><a href="#" id="btn-menu-index">INDEX</a></li>
            <li><a href="#" id="btn-menu-inventario">INventario</a></li>
            <li><a href="#" id="btn-menu-caja">Caja</a></li>
            <li><a href="#" id="btn-menu-configuracion"">Configuracion</a></li> -->
        </ul>
    </div>
        
</div>