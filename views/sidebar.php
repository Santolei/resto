<div class="sidebar-fixed position-fixed animated">

    <a class="logo-wrapper waves-effect">
        <img src="public/img/logo.png" class="img-fluid" alt="">
    </a>

    <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item waves-effect <?php if (isset($active_index)){echo $active_index;}?>">
            <i class="fa fa-pie-chart mr-3"></i>Mesas
        </a>
        <a href="inventario.php" class="list-group-item list-group-item-action waves-effect <?php if (isset($active_inventario)){echo $active_inventario;}?>">
            <i class="fa fa-table mr-3"></i>Inventario
        </a>
        <a href="caja.php" class="list-group-item list-group-item-action waves-effect <?php if (isset($active_caja)){echo $active_caja;}?>">
            <i class="fa fa-money mr-3"></i>Caja
        </a>
        <a href="#" class="list-group-item list-group-item-action waves-effect <?php if (isset($active_usuarios)){echo $active_usuarios;}?>">
            <i class="fa fa-user mr-3"></i>usuarios
        </a>
        <a href="#" class="list-group-item list-group-item-action waves-effect <?php if (isset($active_pedidos)){echo $active_pedidos;}?>">
            <i class="fa fa-pencil mr-3"></i>Pedidos
        </a>
        <a href="configuracion.php" class="list-group-item list-group-item-action waves-effect <?php if (isset($active_configuracion)){echo $active_configuracion;}?>">
            <i class="fa fa-cog mr-3"></i>Configuración
        </a>
    </div>

</div>