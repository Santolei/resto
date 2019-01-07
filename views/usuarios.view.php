<?php require_once 'head.php';?>

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
                                            <td><a href=""><i class="fa fa-edit fa-2x"></i></a></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            
                        </div>
            
                    </div>
                    <!--/.Card-->
            
                </div>
                <!--Grid column-->
                
            </div><!--Grid row-->
        </div>

        <!-- INCLUYO MODAL DE AGREGAR USUARIOS -->
        <?php include "modals/modal_add_user.php" ?>
    </main>
    <!--Main layout-->
    
    <!-- Footer -->
    <?php require_once 'footer.php';?>

    <!-- Script -->

    
    