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
                                <table style="width:100%; border-radius: 6px" class="display table table-striped table-sm" id="tabla_productos">
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
                                <!-- include "modals/modal_edit_producto.php" -->
                                <?php include "modals/modal_borrar_producto.php" ?>
                            </div>

                            <!-- MENSAJE DE SUCCESS O ERROR -->
                            <div class="output-message"></div>

                            <!-- INCLUYO LOS ARCHIVOS DEL MODAL DE AGREGAR PRODUCTOS Y CATEGORIAS -->
                            <?php include "modals/modal_add_producto.php" ?>
                            <?php include "modals/modal_add_categoria.php" ?>
                            
                            <!-- CAJA -->
                            <div class="container pt-2 tab-pane fade p-0" id="caja" role="tabpanel" aria-labelledby="caja-tab">
                                <div class="card mt-4 mb-4 d-flex justify-content-center text-center">
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
                                <table style="width:100%; max-width: 1200px; border-bottom: 1px solid #dee2e6" class="m-auto display table table-striped table-sm" id="tabla_usuarios">
                                    <thead class="tabla-thead white-text">
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Rol</th>
                                        <th>Editar</th>
                                    </thead>
                                    <tbody >
                                        <?php foreach ($usuarios as $usuario): ?>
                                            <tr >
                                                <td class="pb-0"><?php echo $usuario['id_usuario'] ?></td>
                                                <td><?php echo $usuario['nombre'] ?></td>
                                                <td> <?php echo roles($usuario['rol']) ?></td>
                                                <td><a data-toggle="modal" data-target="#modal_edit_user<?php echo $usuario['id_usuario'] ?>"><i class="fa fa-edit fa-2x"></i></a></td>
                                            </tr>
                                            <?php include "modals/modal_edit_user.php" ?>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
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
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
    </script>

    <!-- Ocultar y mostrar sidebar -->

    <script>
        $(document).ready(function () {

          $('#button-collapse-sidebar').on('click', function(){
            var sidebar = $('.sidebar-fixed');
            var main = $('#main');
           
           

            if ($(window).width() < 768) {
               sidebar.toggleClass('slideInLeft');
            }
            else if ($(window).width() >= 768){
                if (sidebar.hasClass('bounceOutLeft')) {
                sidebar.removeClass('bounceOutLeft').addClass('slideInLeft');
                main.removeClass('main').addClass('bounceOutLeft');
                } else if (sidebar.hasClass('slideInLeft')){
                    sidebar.removeClass('slideInLeft').addClass('bounceOutLeft');
                    main.addClass('main'); 
                } 
                else {
                   sidebar.addClass('bounceOutLeft');
                   main.addClass('main'); 
                }
            }
            
          });
            
        });
        
    </script>

    <!-- muestro vistas en el menu -->
<!-- 
    <script>
        $('#contenido').load('ajax-index.php');
        $('#btn-menu-index').on('click', function(){
           $('#contenido').load('ajax-index.php');
           $('#btn-menu-index').addClass('active');
           $('#btn-menu-index').siblings().removeClass('active');
        });
        $('#btn-menu-inventario').on('click', function(){
           $('#contenido').load('ajax-inventario.php'); 
           $('#btn-menu-inventario').addClass('active');
           $('#btn-menu-inventario').siblings().removeClass('active');
        });
        $('#btn-menu-caja').on('click', function(){
           $('#contenido').load('ajax-caja.php'); 
           $('#btn-menu-caja').addClass('active');
           $('#btn-menu-caja').siblings().removeClass('active');
        });
        $('#btn-menu-usuarios').on('click', function(){
           $('#contenido').load('ajax-usuarios.php'); 
           $('#btn-menu-usuarios').addClass('active');
           $('#btn-menu-usuarios').siblings().removeClass('active');
        });
        $('#btn-menu-pedidos').on('click', function(){
           $('#contenido').load('ajax-pedidos.php'); 
           $('#btn-menu-pedidos').addClass('active');
           $('#btn-menu-pedidos').siblings().removeClass('active');
        });
        $('#btn-menu-configuracion').on('click', function(){
           $('#contenido').load('ajax-configuracion.php'); 
           $('#btn-menu-configuracion').addClass('active');
           $('#btn-menu-configuracion').siblings().removeClass('active');
        });

    </script> -->

    <!-- TABS -->
    <script type="text/javascript">
        var home = "http://192.168.0.20<?php echo RUTA?>index.php?view=home";
        var inventario = "http://192.168.0.20<?php echo RUTA?>index.php?view=inventario";
        var caja = "http://192.168.0.20<?php echo RUTA?>index.php?view=caja";
        var usuarios = "http://192.168.0.20<?php echo RUTA?>index.php?view=usuarios";
        var pedidos = "http://192.168.0.20<?php echo RUTA?>index.php?view=pedidos";
        var configuracion = "http://192.168.0.20<?php echo RUTA?>index.php?view=configuracion";

        if (window.location == home){
         $('#home').addClass('active show');
         $('#home-tab').addClass('active');
        }
        else if (window.location == inventario){
         $('#inventario').addClass('active show');
         $('#home').removeClass('active show');
         $('#inventario-tab').addClass('active');
         $('#home-tab').removeClass('active');
        }
        else if (window.location == usuarios){
         $('#usuarios').addClass('active show');
         $('#home').removeClass('active show');
         $('#usuarios-tab').addClass('active');
         $('#home-tab').removeClass('active');
        }
        else if (window.location == pedidos){
         $('#pedidos').addClass('active show');
         $('#home').removeClass('active show');
         $('#pedidos-tab').addClass('active');
         $('#home-tab').removeClass('active');
        }
        else if (window.location == configuracion){
         $('#configuracion').addClass('active show');
         $('#home').removeClass('active show');
         $('#configuracion-tab').addClass('active');
         $('#home-tab').removeClass('active');
        }
    </script>

    <?php if($exibirModal === true) : // Si nuestra variable de control "$exibirModal" es igual a TRUE activa nuestro modal y será visible a nuestro usuario. ?>
    <script>
    $(document).ready(function()
    {
      // id de nuestro modal
      $("#modalBackup").modal("show");
    });
    </script>
    <?php endif; ?>

    <!-- SCRIPTS DE INVENTARIO -->
    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="public/js/addons/datatables.min.js"></script>

    <script>
            
        $(document).ready(function () {
          $('#tabla_productos').DataTable({
            "processing": true,
            "serverSide": true,
            autoFill: true,
            "ajax": "consultas/productosjson.php",
            "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
            $('td:eq(5)', nRow).html('<a href="editar_producto.php?id=' + aData[5] + '">' +
                '<i class="fa fa-pencil text-center"></i>' + '</a>');
            return nRow;
            },
            "language": {
              "url": "public/js/addons/datatablesspanish.json"
            }
          });
          $('.dataTables_length').addClass('bs-select');
        });
    </script>

    <!-- // --------------------------------- // -->
    <!-- // --------------------------------- // -->
    <!-- REGISTRO DE PRODUCTO AJAX -->

    <script>
        $('#form-add-productos').on('submit',function(){
             
            var form = $(this);
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                success: function(){
                    $('.output_message').html('<div class="modal-success fadeIn slower d-flex flex-column align-items-center" ><h5 class="text-center mb-4">¡Excelente!</h5><p class=" mb-2">Producto Agregado</p> <i class="fa fa-check fa-4x"></i></div>'); 
                    setTimeout(function(){
                      $('.output_message').addClass("animated fadeOut");
                      location.reload();
                    }, 2000);
                    setTimeout(function(){
                      
                      location.reload();
                    }, 1000); 
                    
                }
            });
             
            // Prevents default submission of the form after clicking on the submit button. 
            return false;   
        });
    </script>

    <!-- scripts de caja -->

    <script>
            
        $(document).ready(function () {
          var tbl = $('#tabla_ingresos').DataTable({
            "processing": false,
            "serverSide": true,
            autoFill: true,
            "ajax": "consultas/caja_json.php",
            "order": [[ 0, 'desc' ], [ 1, 'asc' ]],
            "searching": false,
            "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
            $('td:eq(2)', nRow).html('$' + aData[2]);
            return nRow;
            },
            "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
            $('td:eq(0)', nRow).html('<a href="detalle_venta.php?id=' + aData[0] + '">' +
                'Ver detalle' + '</a>');
            return nRow;
            },
            "language": {
              "url": "public/js/addons/datatablesspanish.json"
            }
          });

          $('.dataTables_length').addClass('bs-select');
        });


    </script>

    <!-- Scripts de pedidos -->

    <script type="text/javascript">

        if ($( "p:contains('Entregado')" )) {
            $("tr:contains('Entregado')").addClass('alert green accent-3');
        }

        if ($( "p:contains('Pendiente')" )) {
            $("tr:contains('Pendiente')").addClass('alert yellow lighten-2');
        }

        if ($( "p:contains('Devuelto')" )) {
            $("tr:contains('Devuelto')").addClass('alert red lighten-3');
        }
    </script>

    <!-- Script de configuracion -->
    <script>
        $(document).ready(function() {
            $('.config-form').on('submit',function(){
                 
                var form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data:  new FormData(this),      // Datos enviados al servidor 
                    contentType: false,             
                    cache: false,                   
                    processData:false,
                    success: function(){
                        $('.output_message').html('<div class="modal-success fadeIn slower d-flex flex-column align-items-center p-2" ><h5 class="text-center mb-4">¡Excelente!</h5><p class=" mb-2">Datos guardados correctamente. </p> <p>Actualice la ventana del navegador para ver los cambios.</p> <i class="fa fa-check fa-4x mb-3 animated rotateIn "></i></div>'); 
                        setTimeout(function(){
                          $('.output_message').addClass("animated fadeOut");
                        }, 2000); 
                        $('.output_message').removeClass("animated");
                    },
                    error: function() { 
                        $('.output_message').html('<div class="modal-danger fadeIn slower d-flex flex-column align-items-center" ><h5 class="text-center mb-4">¡Error!</h5><p class=" mb-2">Los datos no han sido guardados. Por favor revisa e intentalo nuevamente.</p> <i class="fa fa-times fa-4x mb-3 animated slideInUp "></i></div>'); 
                        setTimeout(function(){
                          $('.output_message').addClass("animated fadeOut");
                        }, 2000); 
                        $('.output_message').removeClass("animated");
                    }
                });
                 
                // Prevents default submission of the form after clicking on the submit button. 
                return false;   
            });
        });
    </script>
    
</body>

</html>

    
    