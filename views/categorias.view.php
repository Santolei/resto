<?php require_once 'head.php';?>

<!-- Datatables -->
<link href="public/css/addons/datatables.min.css" rel="stylesheet">
<body class="bg">
    <div class="bg-gradient"></div>
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
            <div class="row"><!--Grid row-->
                <!--Grid column-->
                <div class="col-12 ">
            
                    <!--Card-->
                    <div class="card">
            
                        <!-- INVENTARIO -->
                        <div class="card-body">
                            <h4 class="mb-4 text-center">
                                <strong class="titulo-seccion">Categorías</strong>
                            </h4>

                            <div class="d-flex flex-column flex-sm-row justify-content-center mb-4">
                                <a class="btn btn-primary" data-toggle="modal" data-target="#modal_add_categoria">Agregar Categoría</a>
                            </div>
                            <table style="width:100%; border-radius: 6px" class="display table table-striped table-sm" id="tabla_categorias">
                                <thead class="tabla-thead white-text">
                                    <th>ID</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Editar</th>
                                    <th class="text-center">Borrar</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($categorias as $categoria): ?>
                                        <tr>
                                            <td><?php echo $categoria['id_categoria'] ?></td>
                                            <td class="text-center"abbr=""><?php echo $categoria['nombre'] ?></td>
                                            <td class="text-center"><a href="editar_categoria.php?id=<?php echo $categoria['id_categoria'] ?>"><i class="fa fa-pencil"></i></a></td>
                                            <td class="text-center"><a data-toggle="modal" data-target="#modalConfirmDelete<?php echo $categoria['id_categoria']; ?>"><i class="fa fa-trash text-danger"></i></a></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <!-- Modals -->
                            <?php include "modals/modal_edit_categoria.php" ?>
                            <?php include "modals/modal_borrar_categoria.php" ?>
                        </div>
            
                    </div>
                    <!--/.Card-->
            
                </div>
                <!--Grid column-->
                
            </div><!--Grid row-->
        </div>

        <!-- MENSAJE DE SUCCESS O ERROR -->
        <div class="output-message"></div>

        <!-- INCLUYO LOS ARCHIVOS DEL MODAL DE AGREGAR PRODUCTOS Y CATEGORIAS -->
        <?php include "modals/modal_add_categoria.php" ?>
    </main>
    <!--Main layout-->
    
    <!-- Footer -->
    <?php require_once 'footer.php';?>

    <!-- // --------------------------------- // -->
    <!-- // --------------------------------- // -->
    <!-- Scripts -->


    

    
    