<?php require_once 'head.php';?>

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
        .ocultar {
            display: none;
        }
        .card-body {
            width:400px;
        }
        table.table-sm td, table.table-sm th{
            padding-top:.5em;
            padding-bottom: .5em;
        }

        .comanda-impresa {
            position: absolute;
            top: 0;
        }
        .titulo-comanda,
        .comanda-impresa .separador-ticket {
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

<script src="public/js/ajax_jquery.min.js"></script>

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

                <div class="col-12 col-md-6 mb-4 izq">
            
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

                               <form id="form-add-productos" method="POST" action="consultas/pedido_mesa.php">
                                  <!-- -----------  BUSCADOR  ----------- -->
                                  <input type="text" class="form-control grey lighten-4 mt-2" name="buscar" autocomplete="off" autofocus onkeyup="buscar_ajax(this.value);" placeholder="Buscar por nombre de producto">
                                  <div id="mostrar" class="mt-2 mb-2 d-flex flex-column justify-content-center">
                                      
                                  </div>
                                    
                                    <input type="text" name="producto" class="form-control" required>
                                    <input type="hidden" name="nro_mesa" value="<?php echo $nro_mesa ?>">
                                    <input type="hidden" name="id_producto">
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
                                

                                  <!-- ----------- FIN BUSCADOR  ----------- -->

                                    <div class="mt-2">
                                    <a class="btn stylish-color-dark waves-effect waves-light" href="index.php"><i class="fa fa-reply-all"></i> Volver </a>
                                    <button type="submit" id="add_productos" class="btn btn-success" name="submit">Agregar</button>
                                  </div>
                                </form>  
                                
                            </div>
                        </div>
            
                    </div>
                    <!--/.Card-->

                    <!-- Buscador de productos -->
                    <div class="card mt-4">
            
                        <!-- MESAS -->
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
                                    <a class="btn btn-primary" id="imprimir" >Imprimir</a>
                                </div>
                            </div>
                        
                        </div>
            
                    </div>
                    <!--/.Card-->
            
                </div>
                <!--Grid column-->

                <div class="output_message"></div>

                <!-- MUESTRO EL PEDIDO -->

                <!--Grid column-->
                <div class="col-12 col-md-6 mb-4">
            
                    <!--Card-->
                    <div class="card">
            
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
                                    <span><i class="fa fa-clock-o"></i> <?php echo($time); ?>hs</span>
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
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <div id="resp"></div>
                                    <?php foreach ($pedidos as $pedido): ?>
                                        <tr>
                                          <td scope="row"><?php echo $pedido['producto']; ?></td>
                                          <td class="print-derecha"><?php echo $pedido['cantidad']; ?></td>
                                          <td class="ocultar"><?php echo $pedido['precio']; ?></td>
                                          <td class="ocultar"><?php echo $pedido['total']; ?></td>
                                        </tr>
                                        
                                    <?php endforeach ?>
                                        <div class="d-flex justify-content-between">
                                            <th class="precio-comanda" style="border-top: 2px solid #333; font-size: 1.2em"><strong>TOTAL:</strong></th>
                                            <td class="precio-comanda" style="border-top: 2px solid #333"></td>
                                            <td class="precio-comanda" style="border-top: 2px solid #333"></td>
                                            <th class="precio-comanda" style="border-top: 2px solid #333; font-size: 1.2em" ><strong>$<?php echo $total_mesa['0'] ?></strong></th>
                                        </div>

                                        
                                  </tbody>
                                </table>
                                
                                <h5 class="mb-2 text-center"><strong>Comentarios:</strong> </h5>
                                <div class="d-flex flex-column text-center">
                                <?php foreach ($pedidos as $pedido2): ?>
                                    <?php if (!empty($pedido2['comentarios'])): ?>
                                    
                                        <div><strong><?php echo $pedido2['producto'] ?></strong></div>
                                       <div class="comentario-comanda"><p><?php echo $pedido2['comentarios']; ?></p></div>
                                    
                                    <?php endif ?>
                                <?php endforeach ?>
                                </div>
                                <div class="separador-ticket"></div>
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

    <!-- Scripts -->

    <script>
        function buscar_ajax(cadena){
            $.ajax({
            type: 'POST',
            url: 'consultas/search.php',
            data: 'cadena=' + cadena,
            success: function(respuesta) {
                //Copiamos el resultado en #mostrar
                $('#mostrar').html(respuesta);
                if($('#mostrar').html()) {
                    
                } else {    
                    $('#mostrar').html('<p>No hay ningún producto registrado con ese nombre</p>');
                }
                
           }
        });
        }


        // SELECCIONO PRODUCTO DEL BUSCADOR Y LO PASO AL INPUT

        $( '#mostrar' ).on( 'click', 'a', function () {
        $('#mostrar').hide();
        $('input[name="buscar"]').val('');
        $('input[name="producto"]').val($(this).attr('data-nombre'));
        $('input[name="cantidad"]').val(1);
        $('input[name="precio"]').val($(this).attr('data-precio'));
        $('input[name="id_producto"]').val($(this).attr('data-id'));
    });

        
    $('#imprimir').click(function(){
        print();
    });

    // prueba

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