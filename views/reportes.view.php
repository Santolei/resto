<?php require_once 'head.php';?>

<body class="bg">
    <div class="bg-gradient"></div>

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <?php require_once 'navbar.php'; ?>
        
        <!-- Sidebar -->
        <?php require_once 'sidebar.php'; ?>
        <!-- Tempus Dominus datetime-picker css -->
        <link rel="stylesheet" href="public/css/addons/tempusdominus-bootstrap-4.min.css" />

    </header>
    <!--Main Navigation-->

        <!--Main layout-->
        <main id="main" class="pt-5">

            <div class="container pt-2">
                <div class="card mt-4 mb-4 d-flex justify-content-center text-center">
                    <h4 class="m-4">
                        <strong class="titulo-seccion">Reporte personalizado</strong>
                    </h4>
                </div>
                    
                <div class="card p-2">
                    <h5 class="titulo-seccion text-center">Reporte de ventas por fecha</h5>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="row">
                            <!-- DESDE -->
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="desde">Fecha de inicio</label>
                                    <div class="input-group date" id="desde" data-target-input="nearest">
                                        <input type="text" name="desde" class="form-control datetimepicker-input" data-target="#desde"/>
                                        <div class="input-group-append" data-target="#desde" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <!-- HASTA -->
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="hasta">Fecha final</label>
                                    <div class="input-group date" id="hasta" data-target-input="nearest">
                                        <input type="text" name="hasta" class="form-control datetimepicker-input" data-target="#hasta"/>
                                        <div class="input-group-append" data-target="#hasta" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary" name="submit">Generar reporte</button>
                            </div>
                        </div>
                    </form>
                </div> 

                <div class="card mt-4 mb-4 d-flex justify-content-center text-center">
                    <?php if (!isset($ventas)): ?>
                    <h5 class="m-4">
                        <strong class="titulo-seccion">Aun no hay datos (Seleccione una fecha)</strong>
                    </h5>
                    <?php else: ?>
                        <h5 class="m-4">
                            <strong class="titulo-seccion">Total de ventas en las fechas indicadas:</strong>
                            <br><br>
                            <div class="m-auto col-12 col-md-6 alert alert-success"><strong class="titulo-seccion">$<?php echo $consumo ?></strong></div>
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-hover" id="tabla_productos">
                                <thead class="stylish-color-dark white-text">
                                    <th>ID</th>
                                    <th>Fecha</th>
                                    <th>N° mesa</th>
                                    <th>Consumo</th>
                                    <th>Detalle</th>
                                </thead>
                                <?php foreach ($ventas as $venta): ?>
                                    <tr>
                                        <td><?php echo $venta['id_venta']; ?></td>
                                        <td><strong><?php echo $venta['fecha']; ?></strong></td>
                                        <td><strong><?php echo $venta['nro_mesa']; ?></strong></td>
                                        <td>$<?php echo $venta['consumo']; ?></td>
                                        <td><a href="detalle_venta.php?id=<?php echo $venta['id_venta']; ?>">Ver detalle</a></td>
                                    </tr>
                                <?php endforeach ?>
                            </table>
                        </div>
                    <?php endif ?>
                    
                </div>
                    
            </div>
            
        </main>
        <!--Main layout-->
        
    
    <!-- Footer -->
    <?php require_once 'footer.php';?>
    <!-- Datetime picker -->
    <script type="text/javascript" src="public/js/moment-with-locales.js"></script>
    <script type="text/javascript" src="public/js/tempusdominus-bootstrap-4.min.js"></script>

    <style type="text/css">
        .footer-copyright {
            display: none;
        }
    </style>
    <script type="text/javascript">
        $(function () {
            $('#desde').datetimepicker({
                viewMode: 'years',
                locale: 'es',
                icons: {
                    up: "fa fa-arrow-up blue-text shadow-none",
                    down: "fa fa-arrow-down blue-text"
                }
            });
            $('#hasta').datetimepicker({
                viewMode: 'years',
                locale: 'es',
                icons: {
                    up: "fa fa-arrow-up blue-text shadow-none",
                    down: "fa fa-arrow-down blue-text"
                }
            });
        });
    </script>
    

    
    