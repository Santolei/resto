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
    
    <style>
    @media print {
        body { 
            color: #000;
            font: 100%/150%; 
        }
        #form-add-productos,
        .imprimir-comanda,
        .nro_mesa,
        .izq,
        .precio,
        .total,
        .precio-comanda,
        .ocultar, 
        .detalle-cuenta,
        .comanda-impresa,
        .button-descuento,
        .btn {
            display: none !important;
        }
        .card-body {
            width:375px;
            padding:0;
        }
        table.table-sm td, table.table-sm th{
            padding-top:.5em;
            padding-bottom: .5em;
        }
        .titulo-comanda,
        .separador-ticket {
            display: block;
        }
        .print-derecha {
            float: right;
        }
        .table thead th,
        .table td,
        table.table td{
            border: none;
            padding:0;
            padding-top: .1em;
        }
    }
</style>

    <!--Main layout-->
    <main class="pt-5">
        <div class="container-fluid mt-5">
            <div class="row"><!--Grid row-->
            <div class="output_message"></div>
                <?php if ($date === '01-01-1970'): ?>
                    <!-- Central Modal Medium Danger -->
                    <div style="position: absolute;left: 50%;top: 50%;transform: translate(-50%, -50%);-webkit-transform: translate(-50%, -50%);">
                      <div class="modal-dialog modal-notify modal-danger" role="document">
                        <!--Content-->
                        <div class="modal-content">
                          <!--Header-->
                          <div class="modal-header">
                            <p class="heading lead">¡Error!</p>

                            
                          </div>

                          <!--Body-->
                          <div class="modal-body">
                            <div class="text-center">
                              <i class="fa fa-times fa-4x mb-3 animated rotateIn"></i>
                              <p>Aún no hay datos suficientes para mostrar la cuenta.</p>
                            </div>
                          </div>

                          <!--Footer-->
                          <div class="modal-footer justify-content-center">
                            <a type="button" class="btn btn-danger" href="index.php">Volver al inicio<i class="fa fa-reply-all ml-1 text-white"></i></a>
                          </div>
                        </div>
                        <!--/.Content-->
                      </div>
                    </div>
                    <!-- Central Modal Medium Danger-->
                <?php else: ?>
                    <!-- MUESTRO EL PEDIDO -->

                    <!--Grid column-->
                    <div class="col-12 col-md-6 mb-4">
                
                        <!--Card-->
                        <div class="ticket m-auto">
                
                            <!-- TICKET -->
                            <div class="card-body">
                                <div class="header-ticket d-flex flex-column justify-center align-items-center">
                                    <div class="logo-ticket">
                                        <img src="<?php echo $logo ?>" class="img-fluid" alt="">
                                    </div>

                                    <div class="nombre-ticket mt-2">
                                        <?php echo $nombre_negocio ?>
                                    </div>
                                    
                                    <div class="cuit-ticket">
                                        CUIT: <?php echo $cuit ?>
                                    </div>
                                    
                                    <div class="direccion-ticket">
                                        <?php echo $direccion ?>
                                    </div>

                                    <div class="telefono-ticket">
                                        TEL: <?php echo $telefono ?>
                                    </div>

                                    <div class="separador-ticket"></div>

                                    <div class="info-fecha d-flex justify-content-between">
                                        <h6 class="mesa-ticket mt-2 mb-sm-0 pt-1">
                                            <span>Mesa <?php echo $nro_mesa ?></span>
                                        </h6>
                                        <h6 class="fecha mt-2 mb-sm-0 pt-1"><?php echo $date ?></h6>
                                    </div>
                                </div>  

                               <hr class="mdb-color"> 

                                <div class="d-flex justify-content-center">
                                    <table width="100%">
                                      <thead>
                                        <tr>
                                          <th scope="col" style="width: 1px">Unid.</th>
                                          <th scope="col">Descripción</th>
                                          <th scope="col">Importe</th>
                                          <th scope="col" class="text-right">Total</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php foreach ($cuenta as $pedido): ?>
                                            <tr>
                                              <td style="width: 1px"><?php echo $pedido['cantidad']; ?></td>
                                              <td><?php echo $pedido['producto']; ?></td>
                                              <td><strong>$</strong> <?php echo $pedido['precio']; ?></td>
                                              <td class="text-right"><strong>$</strong> <?php echo $pedido['total']; ?></td>
                                            </tr>
                                            
                                        <?php endforeach ?>
                                            <tr">
                                                <th style="margin-top: 20px; border-top: 1px dashed #333;"><strong>Subtotal:</strong></th>
                                                <td style="border-top: 1px dashed #333"></td>
                                                <td style="border-top: 1px dashed #333"></td>
                                                <th style="border-top: 1px dashed #333; font-size: 1.05em" class="text-right"><strong>$<?php echo $total_mesa['0'] ?></strong></th>
                                            </tr>
                                        <?php if ($descuento > 0): ?>

                                            <tr>
                                                <th style="margin-top: 20px; border-top: 1px dashed #333;"><strong>Descuento:</strong></th>
                                                <td style="border-top: 1px dashed #333"><strong><?php echo $descuento ?>%</strong></td>
                                                <td style="border-top: 1px dashed #333"></td>
                                                <th style="border-top: 1px dashed #333; font-size: 1.01em" class="text-right"><strong>$-<?php echo $subtotal ?></strong></th>
                                            </tr>

                                            <tr>
                                                <th style="margin-top: 20px; border-top: 2px solid #333;"><strong>TOTAL:</strong></th>
                                                <td style="border-top: 2px solid #333"></strong></td>
                                                <td style="border-top: 2px solid #333"></td>
                                                <th style="border-top: 2px solid #333; font-size: 1.01em" class="text-right"><strong>$<?php echo $total_con_descuento ?></strong></th>
                                            </tr>
                                        <?php else: ?>
                                            <tr class="pt-2">
                                                <th style="margin-top: 20px; border-top: 2px solid #333;"><strong>TOTAL:</strong></th>
                                                <td style="border-top: 2px solid #333"></strong></td>
                                                <td style="border-top: 2px solid #333"></td>
                                                <th style="border-top: 2px solid #333; font-size: 1.01em" class="text-right"><strong>$<?php echo $total_mesa[0] ?></strong></th>
                                            </tr>
                                        <?php endif ?>
                                            
                                      </tbody>
                                    </table>
                                </div>

                                <div class="separador-ticket mt-2"></div>

                                <div class="d-flex flex-column align-items-center">
                                    <div class="mozo mt-2">MOZO: SANTIAGO </div>
                                    
                                    <div class="footer-ticket-iva"> <strong>**(IVA INCLUIDO EN PRECIOS)**</strong></div>

                                    <div class="footer-ticket">-- <?php echo $nombre_negocio ?> / Gracias por su visita --</div>
                                    
                                    <div class="footer-web mt-4"><?php echo $web ?></div>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-primary" id="imprimir">Imprimir</button>
                                </div>
                            </div>


                
                        </div>
                        <!--/.Card-->
                
                    </div>
                    <!--Grid column-->

                    <!-- MUESTRO LOS PRODUCTOS Y LA CUENTA -->

                    <!--Grid column-->
                    <div class="col-12 col-md-6 mb-4 detalle_cuenta">
                
                        <!--Card-->
                        <div class="card m-auto">
                
                            <!-- MESAS -->
                            <div class="card-body comanda-impresa">
                                    <div class="separador-ticket mb-4"></div>
                                    <h4 class="text-center titulo-comanda">Comanda</h4>

                                    <div class="separador-ticket mt-4 mb-4"></div>
                                <div class="d-sm-flex justify-content-between mb-4">
                
                                    <h5 class="mb-2 mb-sm-0 pt-1">
                                        <span>Pedido Mesa <?php echo $nro_mesa ?></span>
                                    </h5>
                                    <h5 class="mb-2 mb-sm-0 pt-1">
                                        <span><i class="fa fa-clock-o"></i> <?php echo($time); ?>hs</span>
                                    </h5>
                                </div>

                                <hr class="mdb-color lighten-3">  

                                    <table class="table table-sm mb-0">
                                      <thead>
                                        <tr class="printable">
                                          <th scope="col">Producto</th>
                                          <th class="print-derecha" scope="col">Cantidad</th>
                                          <th class="ocultar" scope="col precio">Precio</th>
                                          <th class="ocultar" scope="col total">Total</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <div id="resp"></div>
                                        <?php foreach ($cuenta as $pedido): ?>
                                            <tr>
                                              <td scope="row"><?php echo $pedido['producto']; ?></td>
                                              <td class="print-derecha"><?php echo $pedido['cantidad']; ?></td>
                                              <td class="ocultar"><?php echo $pedido['precio']; ?></td>
                                              <td class="ocultar"><?php echo $pedido['total']; ?></td>
                                            </tr>
                                            
                                        <?php endforeach ?>
                                            <tr>
                                                <th class="precio-comanda" style="border-top: 1px dashed #333; font-size: 1.01em"><strong>Subtotal:</strong></th>
                                                <td class="precio-comanda" style="border-top: 1px dashed #333;"></td>
                                                <td class="precio-comanda" style="border-top: 1px dashed #333"></td>
                                                <th class="precio-comanda" style="border-top: 1px dashed #333; font-size: 1.01em" ><strong>$<?php echo $total_mesa['0'] ?></strong></th>
                                            </tr>

                                      </tbody>
                                      <?php if ($descuento > 0): ?>
                                        <tr>
                                            <th class="precio-comanda" style="border: 0; border-bottom: 2px solid #666; font-size: 1.01em"><strong>Descuento <?php echo $descuento ?> %:</strong></th>
                                            <td class="precio-comanda" style="border: 0; border-bottom: 2px solid #666"></td>
                                            <td class="precio-comanda" style="border: 0; border-bottom: 2px solid #666"></td>
                                            <th class="precio-comanda" style="border: 0; border-bottom: 2px solid #666; font-size: 1.01em" ><strong>$-<?php echo $subtotal ?></strong></th>
                                        </tr>

                                        <tr>
                                        <th class="precio-comanda" style="border: 0; font-size: 1.05em"><strong>TOTAL:</strong></th>
                                        <td class="precio-comanda"></td>
                                        <td class="precio-comanda"></td>
                                        <th class="precio-comanda" style="; font-size: 1.05em" ><strong>$<?php echo $total_con_descuento ?></strong></th>
                                        </tr>
                                        <?php else: ?>
                                        <tr>
                                            <th class="precio-comanda" style="border: 0; font-size: 1.05em"><strong>TOTAL:</strong></th>
                                            <td class="precio-comanda"></td>
                                            <td class="precio-comanda"></td>
                                            <th class="precio-comanda" style="; font-size: 1.05em" ><strong>$<?php echo $subtotal_mesa ?></strong></th>
                                        </tr>
                                    <?php endif ?>
                                    </table>
                                    
                                
                                <div class="separador-ticket"></div>

                            </div>

                            <div class="d-flex">
                                <div class="d-flex button-descuento">
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#modalDescuento<?php echo $nro_mesa ?>">Hacer descuento</a>
                                    
                                    <?php include "modals/modal_descuento.php" ?>
                                </div>
                                <div class="d-flex button-descuento">
                                    <a class="btn btn-danger">Cerrar Mesa</a>
                                </div>
                            </div>
                
                        </div>
                        <!--/.Card-->
                
                    </div>
                    <!--Grid column-->
                <?php endif ?>
                
            </div><!--Grid row-->
        </div>

        
    </main>
    <!--Main layout-->
    
    <!-- Footer -->
    <?php require_once 'footer.php';?>

    <!-- Scripts -->

    <script>
        $('#imprimir').click(function(){
            print();
        });

        // AJAX DESCUENTO

        
    </script>

