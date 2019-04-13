<?php require_once 'head.php';?>
<script src="public/js/ajax_jquery.min.js"></script>

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
    <main class="pt-5">
        <div class="container-fluid mt-2 mt-lg-5">
            <div class="row"><!--Grid row-->
                <!--Grid column-->

                <div class="col-12 col-lg-6 mb-4 izq">
            
                    <!-- Buscador de productos -->
                    <div class="card">
            
                        <!-- MESAS -->
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-between mb-4">
            
                                <h5 class="nro_mesa mb-2 mb-sm-0 pt-1">
                                    <span>Mesa <?php echo $nro_mesa ?></span>
                                </h5>
            
                            </div>

                            <hr class="mdb-color lighten-3">  
                            <div class="row d-flex justify-content-center">

                               <form class="w-100" id="form-add-productos" method="POST" action="consultas/pedido_mesa.php">
                                  <!-- -----------  BUSCADOR  ----------- -->
                                  <input type="text" class="form-control grey lighten-4 mt-2" name="buscar" autocomplete="off" autofocus onkeyup="buscar_ajax(this.value);" placeholder="Buscar por nombre de producto">
                                  <div id="mostrar" class="mt-2 mb-2 d-flex flex-column justify-content-center">
                                      
                                  </div>

                                  <div class="d-flex flex-column flex-lg-row flex-wrap mb-3">
                                        <?php foreach ($lista_categorias as $categoria): ?>
                                          <a class="btn btn-primary btn-categorias" data-toggle="modal" data-target="#productos_por_cat_<?php echo $categoria['nombre']; ?>"><?php echo $categoria['nombre'] ?></a>
                                          <?php include 'modals/modal_productos_por_cat.php' ?>
                                        <?php endforeach ?>
                                  </div>
                                    
                                    <div class="d-none">
                                        <input type="text" name="producto" class="form-control" required>
                                        <input type="hidden" name="nro_mesa" value="<?php echo $nro_mesa ?>">
                                        <input type="hidden" name="id_producto">
                                        <input type="hidden" name="categoria">
                                        <input type="hidden" name="mozo" value="<?php echo $usuario_login ?>">
                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <label>Cantidad</label>
                                                <input type="text" class="form-control" id="cantidad" name="cantidad" required>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label>Precio unitario</label>
                                              <input type="text" class="form-control" id="precio" name="precio" required>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="comentarios">Comentarios</label>
                                            <textarea name="comentarios" id="comentarios" cols="30" class=" form-control"></textarea>
                                        </div>
                                                                        
                                        <?php if (!empty($errores)): ?>
                                          <div class="error alert alert-danger mt-3">
                                            <ul class="d-flex justify-content-center align-items-center ">
                                              <?php echo $errores ?>
                                            </ul>
                                          </div>
                                        <?php endif ?>
                                    </div>
                                

                                  <!-- ----------- FIN BUSCADOR  ----------- -->

                                    <div class="mt-2">
                                    <a class="btn btn-secondary purple-gradient waves-effect waves-light" href="index.php"><i class="fa fa-reply-all"></i> Volver a las mesas </a>
                                  </div>
                                </form>  
                                
                            </div>
                        </div>
            
                    </div>
                    <!--/.Card-->

                    <!--Card-->
                    <div class="card mt-4">
            
                        <!-- MESAS -->
                        <div class="card-body comanda-impresa">
                            <div class="separador-ticket mb-2"></div>
                            <h4 class="text-center titulo-comanda">Comanda</h4>

                            <div class="separador-ticket mt-2 mb-3"></div>
                            <div class="d-sm-flex justify-content-between mb-4">
            
                                <h5 class="mb-2 mb-sm-0 pt-1">
                                    <span>Pedido Mesa <?php echo $nro_mesa ?></span>
                                </h5>
                                <h5 class="mb-2 mb-sm-0 pt-1">
                                    <span class="hidden"><i class="fa fa-clock-o"></i> <?php echo($time); ?>hs</span>
                                </h5>
                            </div>

                            <hr class="mdb-color lighten-3">  

                                <table class="table table-sm">
                                  <thead>
                                    <tr class="printable">
                                      <th scope="col">Producto</th>
                                      <th class="print-derecha" scope="col">Cantidad</th>
                                      <th class="ocultar" scope="col precio">Precio</th>
                                      <th class="ocultar" scope="col total">Total</th>
                                      <th class="ocultar" scope="col comentario"></th>
                                      <th class="ocultar" scope="col Eliminar"></th>
                                    </tr>
                                  </thead>
                                  <tbody id="tabla-pedidos">
                                  <tbody>
                                    <div id="resp"></div>
                                    
                                        <div class="d-flex justify-content-between">
                                            <th class="precio-comanda" style="border-top: 2px solid #333; font-size: 1.2em"><strong>TOTAL:</strong></th>
                                            <td class="precio-comanda" style="border-top: 2px solid #333"></td>
                                            <td class="precio-comanda" style="border-top: 2px solid #333"></td>
                                            <th class="precio-comanda" style="border-top: 2px solid #333; font-size: 1.2em" ><strong><div id="total_mesa"></div></strong></th>
                                        </div>

                                        
                                  </tbody>
                                  
                                </table>
                                                                   
                                <h5 class="mb-2 text-center"><strong>Comentarios:</strong> </h5>
                                <div class="d-flex flex-column text-center">
                                    <div id="comentarios_ajax"></div>
                                </div>
                                <div class="separador-ticket"></div>
                        </div>
            
                    </div>
                    <!--/.Card-->
            
                </div>
                <!--Grid column-->

                <div class="output_message"></div>

                <!-- MUESTRO EL PEDIDO -->

                <!--Grid column-->
                <div class="col-12 col-lg-6 mb-4">
            
                    <div class="card">
                        
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-between align-items-center">
                                <div class="imprimir-comanda d-flex flex-column align-items-center justify-content-between w-100 w-sm-50 pr-0 pr-sm-3">
                                    <h5 class="mb-sm-0 pt-1">
                                    <span>Ver cuenta: </span>
                                </h5>
                                <a class="btn btn-danger" href="ver_cuenta.php?id=<?php echo $nro_mesa ?>">Ver cuenta</a>
                                </div>
                                <div class="imprimir-comanda d-flex flex-column align-items-center justify-content-between w-100 w-sm-50">
                                    <h5 class=" mb-sm-0 pt-1">
                                        <span>Imprimir Comanda: </span>
                                    </h5>
                                    <a class="btn btn-primary" id="imprimir">Imprimir</a>
                                </div>
                            </div>
                        
                        </div>
            
                    </div>
                    <!--/.Card-->
            
                </div>
                <!--Grid column-->
                
            </div><!--Grid row-->
        </div>

        <!-- MODAL -->
        <?php include 'modals/modal_add_comentario.php' ?>
        
    </main>
    <!--Main layout-->
    
    <!-- Footer -->
    <?php require_once 'footer.php';?>

    <!-- Scripts -->

    <?php require_once 'inc/scripts-mesa.view.php' ?>