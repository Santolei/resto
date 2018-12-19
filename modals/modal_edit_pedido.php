<!-- Modal -->
<div class="modal fade" id="modalEditPedido" tabindex="-1" aria-labelledby="ModalMesaLabel" aria-hidden="true">
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
          <input type="hidden" name="nro_mesa" value="<?php echo $nro_mesa ?>">
          <input type="hidden" name="id_producto">
          <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Total</th>
                <th scope="col">Estado</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($pedidos as $pedido): ?>
                  <tr>
                    <th scope="row"><?php echo $pedido['producto']; ?></th>
                    <td><?php echo $pedido['cantidad']; ?></td>
                    <td><?php echo $pedido['precio']; ?></td>
                    <td><?php echo $pedido['total']; ?></td>
                    <td>
                      <select name="estado" class="select-estado 
                          <?php if ($pedido['estado'] === 'Entregado'): ?>
                            badge-success
                          <?php else: ?>
                            badge-info
                          <?php endif ?>
                          ">
                        <option value="<?php echo $pedido['estado'] ?>"><?php echo $pedido['estado'] ?></option>
                          <?php if ($pedido['estado'] === 'Entregado'): ?>
                            <option value="Pendiente">Pendiente</option>
                          <?php else: ?>
                            <option value="Entregado" class="success">Entregado</option>
                          <?php endif ?>
                      </select>
                    </td>
                  </tr>
                <?php endforeach ?>
            
              
            </tbody>
          </table>
          


    			<div class="modal-footer mt-4">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" name="submit">Guardar Datos</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>