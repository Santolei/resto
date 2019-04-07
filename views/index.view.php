<?php require_once 'head.php';?>

<body class="bg">
    
    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <?php require_once 'navbar.php'; ?>
        <!-- Navbar -->

        <!-- Sidebar -->
        <?php require_once 'sidebar-home.php'; ?>

    </header>
    <!--Main Navigation-->

    <div id="contenido"></div>

    <main id="main" class="pt-5">
        <div class="container-fluid mt-4 pt-2">
            <div class="container">
                <div class="row"><!--Grid row-->
                    <!--Grid column-->
                    <div class="col-12 mb-4">
                
                        <!--Card-->
                        <div class="tab-content">
                
                            <!-- MESAS -->
                            <div class="card card-body tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="d-flex justify-content-center mb-3">
                
                                    <h5 class="mb-2 mb-sm-0 pt-1 titulo-seccion">
                                        <strong>Mesas</strong>
                                    </h5>
                
                                </div>
                
                                <hr class="mdb-color lighten-3">  
                                <div class="row d-flex justify-content-center">
                
                                    <!-- Recorro la fila mesas y traigo los datos de la bd -->
                                    <!-- Se muestran solo las mesas que esten definidas por el 
                                         usuario en la configuración. -->
                                         
                                    <?php foreach ($mesas as $mesa): ?>
                                        <!-- Mesa -->
                                        <a data-toggle="modal" data-target="#modalMesa<?php echo $mesa['nro_mesa']?>" class="mesa col-12 col-sm-6 col-lg-3 m-2 waves-effect d-flex justify-content-center align-items-center <?php if ($mesa['estado'] == "Disponible"): ?>
                                                    badge-success
                                                <?php else: ?>
                                                    badge-danger
                                                <?php endif ?>">
                                            <div class="badge nro-mesa fa-2x"><?php echo $mesa['nro_mesa'] ?></div>
                                        </a>
                                        <!-- Incluyo el archivo que carga el Modal de la mesa -->
                                        <?php include 'modals/modal_mesa.php';?>
                                    <?php endforeach ?>
                                </div>
                            </div>

                            <!-- INVENTARIO -->
                            <div class="card card-body tab-pane fade" id="inventario" role="tabpanel" aria-labelledby="inventario-tab">
                                <h4 class="mb-4 text-center">
                                    <strong class="titulo-seccion">Inventario</strong>
                                </h4>

                                <div class="d-flex flex-column flex-sm-row justify-content-center mb-4">
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#modal_add_producto">Agregar producto</a>
                                    <a class="btn btn-primary" href="categorias.php">Categorías</a>
                                </div>
                                <div class="table-responsive">
                                    <table style="width: 100%; border-radius: 6px" class="display table table-striped table-sm" id="tabla_productos">
                                        <thead class="tabla-thead white-text">
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Categoría</th>
                                            <th>Stock</th>
                                            <th>Editar</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                                <!-- include "modals/modal_edit_producto.php" -->
                                <?php include "modals/modal_borrar_producto.php" ?>
                            </div>

                            <!-- MENSAJE DE SUCCESS O ERROR -->
                            <div class="output-message"></div>

                            <!-- INCLUYO LOS ARCHIVOS DEL MODAL DE AGREGAR PRODUCTOS Y CATEGORIAS -->
                            <?php include "modals/modal_add_producto.php" ?>
                            <?php include "modals/modal_add_categoria.php" ?>
                            
                            <!-- CAJA -->
                            <div class="container tab-pane fade p-0" id="caja" role="tabpanel" aria-labelledby="caja-tab">
                                <div class="card mb-4 d-flex justify-content-center text-center">
                                    <h4 class="m-4">
                                        <strong class="titulo-seccion">Caja</strong>
                                    </h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-3 mb-4">
                                        <div class="card admin-card justify-content-center">
                                            <div class="clearfix m-2">
                                                <div class="float-left">
                                                    <i class="fa fa-bar-chart red accent-2 mt-1"></i>
                                                </div>
                                                <div class="float-right">
                                                    <div class="titulo-card">Día <?php echo date('d'.'-M'.'-Y') ?></div>
                                                    <div class="ganancia text-right">
                                                        <strong>$<?php echo $montodiario ?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                    </div>

                                    <div class="col-md-6 col-lg-3 mb-4">
                                        <div class="card admin-card justify-content-center">
                                            <div class="clearfix m-2">
                                                <div class="float-left">
                                                    <i class="fa fa-line-chart green accent-3 mt-1"></i>
                                                </div>
                                                <div class="float-right">
                                                    <div class="titulo-card">Mensual:</div>
                                                    <div class="ganancia text-right">
                                                        <strong class="w-100">$<?php echo $montomensual ?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                    </div>

                                    <div class="col-md-6 col-lg-3 mb-4">
                                        <div class="card admin-card justify-content-center">
                                            <div class="clearfix m-2">
                                                <div class="float-left">
                                                    <i class="fa fa-pie-chart warning-color mt-1"></i>
                                                </div>
                                                <div class="float-right">
                                                    <div class="titulo-card">Ganancia Anual:</div>
                                                    <div class="ganancia text-right">
                                                        <strong>$<?php echo $montoanual ?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                    </div>

                                    <div class="col-md-6 col-lg-3 mb-4">
                                        <div class="card admin-card justify-content-center">
                                            <div class="clearfix m-2">
                                                <div class="float-left">
                                                    <i class="fa fa-money primary-color mt-1"></i>
                                                </div>
                                                <div class="float-right">
                                                    <div class="titulo-card">Ganancia Total:</div>
                                                    <div class="ganancia text-right">
                                                        <strong>$<?php echo $ingresos_totales ?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 text-center">
                                        <div class="mb-2 d-flex align-items-center justify-content-center text-center">
                                        
                                            <a class="btn btn-primary" data-toggle="collapse" href="#collapse-ventas" aria-expanded="false" aria-controls="collapse-ventas" style="width: 200px">
                                             Últimas ventas <div class="fa fa-angle-down"></div>
                                            </a>
                                            <a href="reportes.php" class="btn btn-primary">Reportes<i class="ml-2 fa fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row collapse" id="collapse-ventas">
                                    <div class="col-12">
                                        <div class="card p-4">
                                            <h4 class="text-center titulo-seccion">Últimas ventas</h4>

                                            <table style="width:100%; border-radius: 6px" class="display table table-striped table-sm" id="tabla_ingresos">
                                                <thead class="tabla-thead white-text">
                                                    <th>Detalle</th>
                                                    <th>Fecha</th>
                                                    <th>Monto</th>
                                                    <th>Método de pago</th>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>                        
                                    </div>
                                </div>
                            </div>

                            <!-- USUARIOS -->
                            <div class="card card-body tab-pane fade" id="usuarios" role="tabpanel" aria-labelledby="usuarios-tab">
                                <h4 class="mt-1 mb-4 text-center">
                                    <strong class="titulo-seccion">Usuarios</strong>
                                </h4>

                                <div class="d-flex flex-column flex-sm-row justify-content-center mb-2">
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#modal_add_user">Crear nuevo usuario</a>
                                </div>
                                <div class="table-responsive">
                                    <table style="width:100%; max-width: 1200px; border-bottom: 1px solid #dee2e6" class="m-auto display table table-striped table-sm" id="tabla_usuarios">
                                        <thead class="tabla-thead white-text">
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Rol</th>
                                            <th>Editar</th>
                                            <th>Borrar</th>
                                        </thead>
                                        <tbody >
                                            <?php foreach ($usuarios as $usuario): ?>
                                                <tr >
                                                    <td class="pb-0"><?php echo $usuario['id_usuario'] ?></td>
                                                    <td><?php echo $usuario['nombre'] ?></td>
                                                    <td> <?php echo roles($usuario['rol']) ?></td>
                                                    <td><a data-toggle="modal" data-target="#modal_edit_user<?php echo $usuario['id_usuario'] ?>"><i class="fa fa-edit fa-2x"></i></a></td>
                                                    <td><a data-toggle="modal" data-target="#modal_delete_user<?php echo $usuario['id_usuario'] ?>"><i class="fa fa-trash fa-2x"></i></a></td>
                                                </tr>
                                                <?php include "modals/modal_edit_user.php" ?>
                                                <?php include "modals/modal_delete_user.php" ?>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- INCLUYO MODAL DE AGREGAR USUARIOS -->
                                <?php include "modals/modal_add_user.php" ?>
                            </div>

                            <!-- PEDIDOS -->
                            <div class="card card-body tab-pane fade" id="pedidos" role="tabpanel" aria-labelledby="pedidos-tab">
                                <h4 class="mt-1 mb-4 text-center">
                                    <strong class="titulo-seccion">Pedidos</strong>
                                </h4>
                                <table style="width:100%; max-width: 100%; border-bottom: 1px solid #dee2e6" class="m-auto display table table-striped table-sm" id="tabla_usuarios">
                                    <thead class="tabla-thead white-text">
                                        <th>N° de mesa</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Hora</th>
                                        <th>Comentarios</th>
                                        <th>Estado</th>
                                    </thead>
                                    <tbody >
                                        <?php foreach ($pedidos as $pedido): ?>
                                            <?php $hora = date("h:i", strtotime($pedido['ingreso'])); ?>
                                            <tr class="row-pedidos">
                                                <td class="pb-0"><div class="nro_mesa_pedido"><?php echo $pedido['nro_mesa'] ?></div></td>
                                                <td><?php echo $pedido['producto'] ?></td>
                                                <td> <?php echo $pedido['cantidad'] ?></td>
                                                <td> <?php echo $hora ?></td>
                                                <td> <?php echo $pedido['comentarios'] ?></td>
                                                <td class="estado"> <a data-toggle="modal" data-target="#modal_edit_estado<?php echo $pedido['id'] ?>"><?php echo $pedido['estado'] ?></a></td>
                                            </tr>
                                            <?php include 'modals/modal_edit_estado.php' ?>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                                
                            </div>

                            <!-- CONFIGURACION -->
                            <div class="card-body tab-pane fade p-0" id="configuracion" role="tabpanel" aria-labelledby="configuracion-tab">

                                <h4 class="m-4">
                                    <strong class="titulo-seccion">Configuración</strong>
                                </h4>

                                <div class="card mb-4 d-flex flex-column justify-content-center text-center">
                                    <h6 class="mt-4 mb-2">
                                        <i class="fa fa-exclamation-circle"></i><strong> Consejo:</strong> Es recomendable hacer un respaldo de la base de datos al menos una vez por semana.
                                    </h6>
                                    <div class="text-center mb-2">
                                        <a class="btn btn-primary" href="backups"><i class="fa fa-cloud-download"></i> Descargar base de datos</a>
                                    </div>
                                </div>
                                <form action="configuracion.php" class="config-form w-100" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <!--Grid column-->
                                    <div class="col-12 col-md-6 mb-4">
                                
                                        <!--Card-->
                                        <div class="card">
                                
                                            <!-- PERFIL -->
                                            <div class="card-body">
                                                <div class="d-sm-flex justify-content-center mb-4">
                                
                                                    <h5 class="mb-2 mb-sm-0 pt-1">
                                                        <span>Perfil del negocio</span>
                                                    </h5>
                                
                                                </div>

                                                <hr class="mdb-color lighten-3">  
                                                
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="d-block d-sm-flex justify-content-center align-items-center">
                                                            <label for="nombre_negocio" class="col-12 col-sm-6">Nombre del negocio:</label>
                                                            <input type="text" name="nombre_negocio" class="form-control mb-2 col-12 col-sm-6" value="<?php echo $nombre_negocio ?>">
                                                        </div>

                                                        <div class="d-block d-sm-flex justify-content-center align-items-center">
                                                            <label for="direccion" class="col-12 col-sm-6">Dirección:</label>
                                                            <input type="text" name="direccion" class="form-control mb-2 col-12 col-sm-6" value="<?php echo $direccion ?>">
                                                        </div>
                                                        <div class="d-block d-sm-flex justify-content-center align-items-center">
                                                            <label for="telefono" class="col-12 col-sm-6">Teléfono:</label>
                                                            <input type="text" name="telefono" class="form-control mb-2 col-12 col-sm-6" value="<?php echo $telefono ?>">
                                                        </div>
                                                        <div class="d-block d-sm-flex justify-content-center align-items-center">
                                                            <label for="cuit" class="col-12 col-sm-6">Cuit:</label>
                                                            <input type="text" name="cuit" class="form-control mb-2 col-12 col-sm-6" value="<?php echo $cuit ?>">
                                                        </div>
                                                        <div class="d-block d-sm-flex justify-content-center align-items-center">
                                                            <label for="web" class="col-12 col-sm-6 m-0">Web:</label>
                                                            <input type="text" name="web" class="form-control mb-2 col-12 col-sm-6 ml-0" value="<?php echo $web ?>" >
                                                        </div>
                                                        <hr>
                                                        <div class="d-block d-sm-flex flex-column justify-content-center ">
                                                            <label for="logo" class="">Logo:</label>
                                                            <input type="file" name="logo" id="logo" size="145" class="mb-2 ">
                                                        </div>
                                                        <div class="alert alert-info"><i class="fa fa-arrow-up"></i> El tamaño máximo permitido es de 240 píxeles de ancho</div>
                                                            
                                                    </div>
                                                    <?php if (isset($success)): ?>
                                                        <div class="alert alert-success wow fadeIn">Datos Guardados</div>
                                                    <?php endif ?>
                                                    <?php if (isset($errores)): ?>
                                                        <div class="alert alert-danger wow fadeIn"><?php echo $errores ?></div>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                
                                        </div>
                                        <!--/.Card-->
                                
                                    </div>
                                    <!--Grid column-->
                                
                                    <!--Grid column-->
                                    <div class="col-12 col-md-6 mb-4">
                                
                                        <!--Card-->
                                        <div class="card">
                                
                                            <!-- MESAS -->
                                            <div class="card-body">
                                                <div class="d-sm-flex justify-content-center mb-4">
                                
                                                    <h5 class="mb-2 mb-sm-0 pt-1">
                                                        <span>Mesas</span>
                                                    </h5>
                                
                                                </div>

                                                <hr class="mdb-color lighten-3">  
                                                
                                                <div class="row">
                                                    <div class="col-12">
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <label for="cant_mesas" class="col-6"> Cantidad de mesas:</label>
                                                                <input type="text" name="cant_mesas" class="form-control mb-2 col-6" value="<?php echo $cant_mesas ?>">
                                                            </div>
                                                            
                                                    </div>
                                                    <?php if (isset($success)): ?>
                                                        <div class="alert alert-success wow fadeIn">Datos Guardados</div>
                                                    <?php endif ?>
                                                    <?php if (isset($errores)): ?>
                                                        <div class="alert alert-danger wow fadeIn"><?php echo $errores ?></div>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                
                                        </div>
                                        <!--/.Card-->
                                
                                    </div>
                                    <!--Grid column-->
                                </div>
                            
                            <div class="text-center">
                                <button class="btn btn-primary" name="submit" type="submit">Guardar</button>
                            </div>
                        </form>
                            <div class="output_message"></div>
                            </div>

                        </div>
                        <!--/.Card tab-content-->
                        
                        

                    </div>
                    <!--Grid column-->
                    
                </div><!--Grid row-->
            </div>
        </div>
        <?php include 'modals/modal_backup.php' ?>
        
    </main>
    
    <!--Main layout-->
    <div class="bg-gradient"></div>
    <!-- Scripts -->
       <!-- JQuery -->
    <script type="text/javascript" src="<?php echo RUTA ?>public/js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo RUTA ?>public/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo RUTA ?>public/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo RUTA ?>public/js/mdb.min.js"></script>
    <!-- Initializations -->
    
    <!-- SCRIPTS  -->

    <?php include_once 'inc/scripts-home.view.php' ?>
    
</body>

</html>

    
    