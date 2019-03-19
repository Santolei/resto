<!-- Modal de agregar producto -->
<div class="modal fade" id="modal_edit_estado<?php echo $pedido['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header success-color">
        <p class="heading lead">Editar estado</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        <form action="consultas/edit_estado.php" method="POST">
          <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $pedido['id']; ?>">
            <label for="estado">Estado:</label>
            <select class="form-control" name="estado" selected="Seleccionar Estado" required>
              <option value="">Seleccionar estado</option>
                <option value="Pendiente">Pendiente</option>
                <option value="Entregado">Entregado</option>
                <option value="Devuelto">Devuelto</option>
            </select>
          </div>
          <!--Footer-->
        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn success-color white-text">Guardar</button>
          <a class="btn btn-outline-success waves-effect" data-dismiss="modal">Salir</a>
        </div>
        </form>
      </div>

      
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Central Modal Medium Info-->