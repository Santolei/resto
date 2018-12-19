<!-- Modal -->
<div class="modal fade" id="modalDescuento<?php echo $nro_mesa ?>" tabindex="-1" aria-labelledby="ModalMesaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalMesaLabel">Descuento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="consultas/descuento.php?id=<?php echo $nro_mesa ?>" id="descuento" method="POST">
          <input type="hidden" name="nro_mesa" value="<?php echo $nro_mesa ?>">
          <label for="descuento">Ingrese el valor en % a descontar de la cuenta</label>
          <input type="number" class="form-control" required="Debes ingresar un número del 1 al 100" name="descuento">

    			<div class="modal-footer mt-4">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" name="submit">Guardar Datos</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>