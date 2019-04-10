<?php require_once 'head.php';?>

<body class="bg">
    <div class="bg-gradient"></div>

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <?php require_once 'navbar.php'; ?>
        
        <!-- Sidebar -->
        <?php require_once 'sidebar.php'; ?>

    </header>
    <!--Main Navigation-->

        <!--Main layout-->
        <main id="main" class="pt-5">

            <div class="container pt-2">
                <div class="card mt-4 mb-4 d-flex justify-content-center text-center">
                    <h4 class="m-4">
                        <strong class="titulo-seccion">Caja</strong>
                    </h4>
                </div>
                <div class="row">
                    

                    

                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="card admin-card justify-content-center">
                            <div class="clearfix m-2">
                                <div class="float-left">
                                    <i class="fa fa-bar-chart red accent-2 mt-1"></i>
                                </div>
                                <div class="float-right">
                                    <div class="titulo-card">Día <?php echo date('d'.'-M'.'-Y') ?></div>
                                    <div class="ganancia text-right">
                                        <strong>$<?php echo $montodiario ?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>

                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="card admin-card justify-content-center">
                            <div class="clearfix m-2">
                                <div class="float-left">
                                    <i class="fa fa-line-chart green accent-3 mt-1"></i>
                                </div>
                                <div class="float-right">
                                    <div class="titulo-card">Ganancia Mensual:</div>
                                    <div class="ganancia text-right">
                                        <strong>$<?php echo $montomensual ?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>

                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="card admin-card justify-content-center">
                            <div class="clearfix m-2">
                                <div class="float-left">
                                    <i class="fa fa-pie-chart warning-color mt-1"></i>
                                </div>
                                <div class="float-right">
                                    <div class="titulo-card">Ganancia Anual:</div>
                                    <div class="ganancia text-right">
                                        <strong>$<?php echo $montoanual ?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>

                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="card admin-card justify-content-center">
                            <div class="clearfix m-2">
                                <div class="float-left">
                                    <i class="fa fa-money primary-color mt-1"></i>
                                </div>
                                <div class="float-right">
                                    <div class="titulo-card">Ganancia Total:</div>
                                    <div class="ganancia text-right">
                                        <strong>$<?php echo $ingresos_totales ?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 text-center">
                        <div class="card admin-card mb-2 d-flex align-items-center justify-content-center text-center">
                        
                            <a class="btn btn-primary" data-toggle="collapse" href="#collapse-ventas" aria-expanded="false" aria-controls="collapse-ventas" style="width: 200px">
                             Últimas ventas <div class="fa fa-angle-down"></div>
                            </a>
                            <a href="reportes" class="btn btn-primary">Reportes<i class="ml-2 fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="row collapse" id="collapse-ventas">
                    <div class="col-12">
                        <div class="card p-4">
                            <h4 class="text-center titulo-seccion">Últimas ventas</h4>

                            <table style="width:100%; border-radius: 6px" class="display table table-striped table-sm" id="tabla_ingresos">
                                <thead class="tabla-thead white-text">
                                    <th>Detalle</th>
                                    <th>Fecha</th>
                                    <th>Monto</th>
                                    <th>Método de pago</th>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>                        
                    </div>
                </div>
            </div>
            
        </main>
        <!--Main layout-->
        
    
    <!-- Footer -->
    <?php require_once 'footer.php';?>
    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="public/js/addons/datatables.min.js"></script>
    <script type="text/javascript" src="public/js/addons/dataTables.altEditor.js"></script>
    <style type="text/css">
        .footer-copyright {
            display: none;
        }
    </style>
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

    
    