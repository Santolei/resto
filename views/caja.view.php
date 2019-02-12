<?php require_once 'head.php';?>

<body class="bg">
    <div class="bg-gradient"></div>

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <?php require_once 'navbar.php'; ?>
        
        <!-- Sidebar -->
        <?php require_once 'sidebar.php'; ?>

    </header>
    <!--Main Navigation-->

        <!--Main layout-->
        <main id="main" class="pt-5">

            <div class="container pt-2">
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
                                    <div class="titulo-card">Ganancia Mensual:</div>
                                    <div class="ganancia text-right">
                                        <strong>$<?php echo $montomensual ?></strong>
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
                    <div class="col-12">
                        <div class="card">
                            <h4 class="text-center m-4 titulo-seccion">Generar reporte</h4>
                        </div>
                    </div>
                </div>
            </div>
            
        </main>
        <!--Main layout-->
        
    
    <!-- Footer -->
    <?php require_once 'footer.php';?>

    
    