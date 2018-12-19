<!-- Modal -->
<div class="modal fade" id="modalVerCuenta<?php echo $mesa['nro_mesa']?>" tabindex="-1" aria-labelledby="ModalMesaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalMesaLabel">Editar estado del pedido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="consultas/edit_pedido.php?id=<?php echo $nro_mesa ?>" method="POST">
          <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($cuenta as $pedido): ?>
                  <tr>
                    <th scope="row"><?php echo $pedido['producto']; ?></th>
                    <td><?php echo $pedido['cantidad']; ?></td>
                    <td><?php echo $pedido['precio']; ?></td>
                    <td><?php echo $pedido['total']; ?></td>
                  </tr>
                  
              <?php endforeach ?>
                  <div class="d-flex justify-content-between">
                      <th style="border-top: 2px solid #333; font-size: 1.2em"><strong>TOTAL:</strong></th>
                      <td style="border-top: 2px solid #333"></td>
                      <td style="border-top: 2px solid #333"></td>
                      <th style="border-top: 2px solid #333; font-size: 1.2em" ><strong>$<?php echo $total_mesa['0'] ?></strong></th>
                  </div>
            </tbody>
          </table>


    			<div class="modal-footer mt-4">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" name="submit">Imprimir</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>