<?php require_once 'head.php';?>

<body class="bg">
    
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
    <main id="main" class="pt-5">
        <div class="container-fluid mt-4 pt-2">
            <div class="container">
                <div class="row"><!--Grid row-->
                    <!--Grid column-->
                    <div class="col-12 mb-4">
                
                        <!--Card-->
                        <div class="card">
                
                            <!-- MESAS -->
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                
                                    <h5 class="mb-2 mb-sm-0 pt-1 titulo-seccion">
                                        <strong>Editar categoria</strong>
                                    </h5>
                
                                </div>
                
                                <hr class="mdb-color lighten-3">  
									
									<div class="box p-2 mb-2">
										<p><strong>Nombre:</strong> <?php echo $categoria['nombre']; ?></p> 
										
									</div>

                                	<a class="btn btn-primary" data-toggle="modal" data-target="#modal_edit_categoria<?php echo $categoria['id_categoria']; ?>">Editar categoría</a>

                                    <a class="btn stylish-color-dark waves-effect waves-light" href="categorias.php"><i class="fa fa-reply-all"></i> Volver </a>
                					
                                    <?php include 'modals/modal_edit_categoria.php' ?>
                            </div>
                
                        </div>
                        <!--/.Card-->
                
                    </div>
                    <!--Grid column-->
                    
                </div><!--Grid row--></div>
        </div>

        
    </main>
    <!--Main layout-->
    <div class="bg-gradient"></div>
    <!-- Scripts -->
       <!-- JQuery -->
    <script type="text/javascript" src="public/js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="public/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="public/js/mdb.min.js"></script>
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

</body>

</html>

    
    