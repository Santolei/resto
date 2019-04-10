<?php 

// Voy a traer los datos de roles y usuarios
    require_once 'consultas/roles.php';
    require_once 'consultas/usuarios.php';

 ?>

<div class="sidebar-fixed position-fixed animated white-text">
    <a class="logo-wrapper waves-effect" href="index">
        <img src="<?php echo $logo ?>" class="img-fluid" alt="">
    </a>

    
        <!-- PRUEBA DE MENU -->
        <ul class=" list-group list-group-flush" id="myTab" role="tablist">
            <li class="nav-item p-0">
                <a class="nav-link list-group-item list-group-item-action waves-effect active  m-0" id="home-tab" href="http://192.168.0.20<?php echo RUTA?>index?view=home" role="tab" aria-controls="home"
                  aria-selected="true"><i class="fa fa-pie-chart mr-3"></i>Mesas</a>
            </li>

            <!-- Muestro esta parte del menu al administrador  -->
            <?php if ($usuario_logueado['rol'] != 1): ?>
            <?php else: ?>
                <li class="nav-item p-0">
                    <a class="nav-link list-group-item list-group-item-action waves-effect m-0" id="inventario-tab" href="http://192.168.0.20<?php echo RUTA?>index?view=inventario" role="tab" aria-controls="inventario"
                      aria-selected="false"><i class="fa fa-table mr-3"></i>Inventario</a>
                </li>
            <?php endif ?>
            <!-- Muestro esta parte del menu al administrador o al cajero -->
            <?php if ($usuario_logueado['rol'] != 1): ?> 
                
            <?php else: ?>
                <li class="nav-item p-0">
                    <a class="nav-link list-group-item list-group-item-action waves-effect" id="caja-tab" href="http://192.168.0.20<?php echo RUTA?>index?view=caja" role="tab" aria-controls="caja"
                      aria-selected="false"><i class="fa fa-money mr-3"></i>Caja</a>
                </li>
            <?php endif ?>

            <?php if ($usuario_logueado['rol'] != 1): ?> 
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link list-group-item list-group-item-action waves-effect" id="usuarios-tab"  href="http://192.168.0.20<?php echo RUTA?>index?view=usuarios" role="tab" aria-controls="usuarios"
                      aria-selected="false"><i class="fa fa-user mr-3"></i>Usuarios</a>
                </li>
            <?php endif ?>      
            
            
            <li class="nav-item">
                <a class="nav-link list-group-item list-group-item-action waves-effect" id="pedidos-tab" href="http://192.168.0.20<?php echo RUTA?>index?view=pedidos" role="tab" aria-controls="pedidos"
                  aria-selected="false"><i class="fa fa-pencil mr-3"></i>Pedidos</a>
            </li>

            <?php if ($usuario_logueado['rol'] != 1): ?> 
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link list-group-item list-group-item-action waves-effect" id="configuracion-tab" href="http://192.168.0.20<?php echo RUTA?>index?view=configuracion" role="tab" aria-controls="configuracion"
                      aria-selected="false"><i class="fa fa-cog mr-3"></i>Configuración</a>
                </li>
            <?php endif ?>  
            <li class="nav-item">
                <a class="list-group-item list-group-item-action waves-effect" href="logout.php"><i class="fa fa-sign-out mr-3"></i>Salir</a>
            </li>
        </ul>
    
         <div class="sidebar-copyright mb-2">
            <u>Versión de prueba:</u> <br> 
            <strong>Tiempo restante:</strong> <br>
            <section class="contador">
            <p id="demo" class="contador-js text-danger"> </p><p class="contador-texto"></p>
            </section>

            <script>// Set the date we're counting down to
            var countDownDate = new Date("May 9, 2019 09:00:00").getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

              // Get todays date and time
              var now = new Date().getTime();

              // Find the distance between now an the count down date
              var distance = countDownDate - now;

              // Time calculations for days, hours, minutes and seconds
              var days = Math.floor(distance / (1000 * 60 * 60 * 24));
              var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
              var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
              var seconds = Math.floor((distance % (1000 * 60)) / 1000);

              // Display the result in the element with id="demo"
              document.getElementById("demo").innerHTML = days + " dias " + hours + " h "
              + minutes + " m " + seconds + " s";

              // If the count down is finished, write some text 
              if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRADO";
              }
            }, 1000);</script>
             © <?php echo date('Y'); ?> Desarrollo:
                <a href="http://www.neomicron.com.ar/" target="_blank"> Neomicron </a>
         </div>
</div>