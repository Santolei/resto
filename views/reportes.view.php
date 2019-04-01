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
                        <strong class="titulo-seccion">Reportes</strong>
                    </h4>
                </div>

                <div class="row">
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

    
    