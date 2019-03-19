<!-- Datatables -->
    <link href="public/css/addons/datatables.min.css" rel="stylesheet">
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
            
                    </div>
                    <!--/.Card-->
            
                </div>
                <!--Grid column-->
                
            </div><!--Grid row-->
        </div>

        <!-- MENSAJE DE SUCCESS O ERROR -->
        <div class="output-message"></div>

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