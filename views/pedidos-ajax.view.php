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
                                <strong class="titulo-seccion">Pedidos</strong>
                            </h4>
                            <table style="width:100%; max-width: 100%; border-bottom: 1px solid #dee2e6" class="m-auto display table table-striped table-sm" id="tabla_usuarios">
                                <thead class="tabla-thead white-text">
                                    <th>N° de mesa</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Hora</th>
                                    <th>Comentarios</th>
                                    <th>Estado</th>
                                </thead>
                                <tbody >
                                    <?php foreach ($pedidos as $pedido): ?>
                                        <?php $hora = date("h:i", strtotime($pedido['ingreso'])); ?>
                                        <tr class="row-pedidos">
                                            <td class="pb-0"><div class="nro_mesa_pedido"><?php echo $pedido['nro_mesa'] ?></div></td>
                                            <td><?php echo $pedido['producto'] ?></td>
                                            <td> <?php echo $pedido['cantidad'] ?></td>
                                            <td> <?php echo $hora ?></td>
                                            <td> <?php echo $pedido['comentarios'] ?></td>
                                            <td class="estado"> <a data-toggle="modal" data-target="#modal_edit_estado<?php echo $pedido['id'] ?>"><?php echo $pedido['estado'] ?></a></td>
                                        </tr>
                                        <?php include 'modals/modal_edit_estado.php' ?>
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

    </main>
    <!--Main layout-->

    <!-- Script -->

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