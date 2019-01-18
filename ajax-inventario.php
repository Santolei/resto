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
                                <strong class="titulo-seccion">Inventario</strong>
                            </h4>

                            <div class="d-flex flex-column flex-sm-row justify-content-center mb-4">
                                <a class="btn btn-primary" data-toggle="modal" data-target="#modal_add_producto">Agregar producto</a>
                                <a class="btn btn-primary" data-toggle="modal" data-target="#modal_add_categoria">Agregar Categoría</a>
                            </div>
                            <table style="width:100%; border-radius: 6px" class="display table table-striped table-sm" id="tabla_productos">
                                <thead class="tabla-thead white-text">
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Categoría</th>
                                    <th>Stock</th>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <!-- include "modals/modal_edit_producto.php" -->
                            <?php include "modals/modal_borrar_producto.php" ?>
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