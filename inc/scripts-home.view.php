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

    <!-- TABS -->
    <script type="text/javascript">
        var home = "http://192.168.0.20<?php echo RUTA?>index.php?view=home";
        var inventario = "http://192.168.0.20<?php echo RUTA?>index.php?view=inventario";
        var caja = "http://192.168.0.20<?php echo RUTA?>index.php?view=caja";
        var usuarios = "http://192.168.0.20<?php echo RUTA?>index.php?view=usuarios";
        var pedidos = "http://192.168.0.20<?php echo RUTA?>index.php?view=pedidos";
        var configuracion = "http://192.168.0.20<?php echo RUTA?>index.php?view=configuracion";

        if (window.location == home){
         $('#home').addClass('active show');
         $('#home-tab').addClass('active');
        }
        else if (window.location == inventario){
         $('#inventario').addClass('active show');
         $('#home').removeClass('active show');
         $('#inventario-tab').addClass('active');
         $('#home-tab').removeClass('active');
        }
        else if (window.location == caja){
         $('#caja').addClass('active show');
         $('#home').removeClass('active show');
         $('#caja-tab').addClass('active');
         $('#home-tab').removeClass('active');
        }
        else if (window.location == usuarios){
         $('#usuarios').addClass('active show');
         $('#home').removeClass('active show');
         $('#usuarios-tab').addClass('active');
         $('#home-tab').removeClass('active');
        }
        else if (window.location == pedidos){
         $('#pedidos').addClass('active show');
         $('#home').removeClass('active show');
         $('#pedidos-tab').addClass('active');
         $('#home-tab').removeClass('active');
        }
        else if (window.location == configuracion){
         $('#configuracion').addClass('active show');
         $('#home').removeClass('active show');
         $('#configuracion-tab').addClass('active');
         $('#home-tab').removeClass('active');
        }
    </script>

    <!-- Esto viene de inc/sessions.php -->
    <?php if($exibirModal === true AND $usuario_logueado[2] == 1) : 
    // Si nuestra variable de control "$exibirModal" es igual a TRUE activa nuestro modal y será visible a nuestro usuario. ?>
    <script>
    $(document).ready(function()
    {
      $("#modalBackup").modal("show");
    });
    </script>
    <?php endif; ?>

    <!-- SCRIPTS DE INVENTARIO -->
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

    <!-- SCRIPTS DE USUARIOS -->

    <script>
        $('.btn-delete-user').on('click',function(){

            var link = $(this);
            id_usuario = link.attr('data-usuario');
            $.ajax({
                url: "consultas/borrar_usuario.php?id="+link.attr('data-usuario'),
                success: function(){
                    $('.modal_delete_user').modal('hide');
                    alert("Usuario Borrado correctamente");
                    console.log('usuario borrado');
                }
            });
        }); 
            
    </script>

    <!-- scripts de caja -->

    <script>
            
        $(document).ready(function () {
          var tbl = $('#tabla_ingresos').DataTable({
            "processing": false,
            "serverSide": true,
            autoFill: true,
            "ajax": "consultas/caja_json.php",
            "order": [[ 0, 'desc' ], [ 1, 'asc' ]],
            "searching": false,
            "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
            $('td:eq(2)', nRow).html('$' + aData[2]);
            return nRow;
            },
            "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
            $('td:eq(0)', nRow).html('<a href="detalle_venta.php?id=' + aData[0] + '">' +
                'Ver detalle' + '</a>');
            return nRow;
            },
            "language": {
              "url": "public/js/addons/datatablesspanish.json"
            }
          });

          $('.dataTables_length').addClass('bs-select');
        });


    </script>

    <!-- Scripts de pedidos -->

    <script type="text/javascript">

        

        if ($( "p:contains('Entregado')" )) {
            $("tr:contains('Entregado')").addClass('alert green accent-3');
        }

        if ($( "p:contains('Pendiente')" )) {
            $("tr:contains('Pendiente')").addClass('alert yellow lighten-2');
        }

        if ($( "p:contains('Devuelto')" )) {
            $("tr:contains('Devuelto')").addClass('alert red lighten-3');
        }
    </script>

    <!-- Script de configuracion -->
    <script>
        $(document).ready(function() {
            $('.config-form').on('submit',function(){
                 
                var form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data:  new FormData(this),      // Datos enviados al servidor 
                    contentType: false,             
                    cache: false,                   
                    processData:false,
                    success: function(){
                        $('.output_message').html('<div class="modal-success fadeIn slower d-flex flex-column align-items-center p-2" ><h5 class="text-center mb-4">¡Excelente!</h5><p class=" mb-2">Datos guardados correctamente. </p> <p>Actualice la ventana del navegador para ver los cambios.</p> <i class="fa fa-check fa-4x mb-3 animated rotateIn "></i></div>'); 
                        setTimeout(function(){
                          $('.output_message').addClass("animated fadeOut");
                        }, 2000); 
                        $('.output_message').removeClass("animated");
                    },
                    error: function() { 
                        $('.output_message').html('<div class="modal-danger fadeIn slower d-flex flex-column align-items-center" ><h5 class="text-center mb-4">¡Error!</h5><p class=" mb-2">Los datos no han sido guardados. Por favor revisa e intentalo nuevamente.</p> <i class="fa fa-times fa-4x mb-3 animated slideInUp "></i></div>'); 
                        setTimeout(function(){
                          $('.output_message').addClass("animated fadeOut");
                        }, 2000); 
                        $('.output_message').removeClass("animated");
                    }
                });
                 
                // Prevents default submission of the form after clicking on the submit button. 
                return false;   
            });
        });
    </script>