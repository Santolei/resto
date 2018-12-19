<?php require_once 'head.php';?>

<!-- Datatables -->
<link href="public/css/addons/datatables.min.css" rel="stylesheet">
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
        <div class="container-fluid mt-5">
            <div class="row"><!--Grid row-->
                <!--Grid column-->
                <div class="col-12 col-md-8">
            
                    <!--Card-->
                    <div class="card">
            
                        <!-- INVENTARIO -->
                        <div class="card-body">
                            <div class="d-flex flex-column flex-sm-row justify-content-center mb-2">
                                <a class="btn btn-primary" data-toggle="modal" data-target="#modal_add_producto">Agregar producto</a>
                                <a class="btn btn-primary">Agregar Categoría</a>
                            </div>
                            <table class="table table-sm table-hover table-responsive" id="tabla_productos">
                                    <thead class="stylish-color-dark white-text">
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Categoría</th>
                                        <th>Stock</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </thead>
                                <?php foreach ($productos as $producto): ?>
                                    <tr>
                                        <td><?php echo $producto['id_producto']; ?></td>
                                        <td><strong><?php echo $producto['nombre']; ?></strong></td>
                                        <td><strong>$<?php echo $producto['precio']; ?></strong></td>
                                        <td><?php echo $producto['categoria']; ?></td>
                                        <td><?php echo $producto['stock']; ?></td>
                                        <td><button type="button" class="btn default-color btn-sm m-0" data-toggle="modal" data-target="#modal_edit_producto<?php echo $producto['id_producto']; ?>"><i class="fa fa-pencil"></i></button></td>
                                        <td><button type="button" class="btn btn-danger btn-sm m-0" data-toggle="modal" data-target="#modalConfirmDelete<?php echo $producto['id_producto']; ?>"><i class="fa fa-times"></i></button></td>
                                    </tr>
                                    <?php include "modals/modal_edit_producto.php" ?>
                                    <?php include "modals/modal_borrar_producto.php" ?>
                                <?php endforeach ?>
                            </table>
                        </div>
            
                    </div>
                    <!--/.Card-->
            
                </div>
                <!--Grid column-->

                <div class="col-12 col-md-4">
            
                    <!--Card-->
                    <div class="card">
            
                        <!-- Botones -->
                        <div class="card-body">
                            <div class="col-12">
                                
                            </div>
                        </div>
            
                    </div>
                    <!--/.Card-->
            
                </div>
                <!--Grid column-->
                
            </div><!--Grid row-->
        </div>

        <!-- INCLUYO LOS ARCHIVOS DEL MODAL DE AGREGAR PRODUCTOS Y CATEGORIAS -->
        <?php include "modals/modal_add_producto.php" ?>
        <?php include "modals/modal_add_categoria.php" ?>
    </main>
    <!--Main layout-->
    
    <!-- Footer -->
    <?php require_once 'footer.php';?>

    <!-- // --------------------------------- // -->
    <!-- // --------------------------------- // -->
    <!-- Scripts -->

    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="public/js/addons/datatables.min.js"></script>

    <script>

        $(document).ready(function () {
          $('#tabla_productos').DataTable({
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

    

    
    