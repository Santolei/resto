<?php require_once 'head.php';?>

<body class="grey lighten-2">

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <?php require_once 'navbar.php'; ?>
        <!-- Navbar -->

        <!-- Sidebar -->
        <?php require_once 'sidebar.php'; ?>

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="pt-5">
        <div class="container-fluid mt-4 pt-2">
            <div class="row"><!--Grid row-->
                <!--Grid column-->
                <div class="col-12 col-md-8 mb-4">
            
                    <!--Card-->
                    <div class="card">
            
                        <!-- MESAS -->
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-between mb-4">
            
                                <h4 class="mb-2 mb-sm-0 pt-1 titulo-seccion">
                                    <strong>Mesas</strong>
                                </h4>
            
                                <h4 class="mb-2 mb-sm-0 pt-1">
                                    <span>Salón 1</span>
                                </h4>
            
                            </div>

                            <hr class="mdb-color lighten-3">  
                            <div class="row d-flex justify-content-center">

                                <!-- Recorro la fila mesas y traigo los datos de la bd -->
                                <!-- Se muestran solo las mesas que esten definidas por el 
                                     usuario en la configuración. -->
                                     
                                <?php foreach ($mesas as $mesa): ?>
                                    <!-- Mesa -->
                                    <a class="mesa col-12 col-sm-6 col-lg-3 m-2" data-toggle="modal" data-target="#modalMesa<?php echo $mesa['nro_mesa']?>">
                                        <div class="badge badge-primary nro-mesa">Mesa <?php echo $mesa['nro_mesa'] ?></div>
                                        
                                        <div class="badge estado-mesa 
                                            <?php if ($mesa['estado'] == "Disponible"): ?>
                                            	badge-success
                                            <?php else: ?>
                                            	badge-danger
                                            <?php endif ?>"><?php echo $mesa['estado'] ?>
                                        </div>
                                    </a>
                                    <!-- Incluyo el archivo que carga el Modal de la mesa -->
                                    <?php include 'modals/modal_mesa.php';?>
                                <?php endforeach ?>
                            </div>
                        </div>
            
                    </div>
                    <!--/.Card-->
            
                </div>
                <!--Grid column-->
                
            </div><!--Grid row-->
        </div>

        
    </main>
    <!--Main layout-->
    
    <!-- Footer -->
    <?php require_once 'footer.php';?>

    <!-- Script -->

    
    