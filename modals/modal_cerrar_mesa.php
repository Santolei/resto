<!--Modal: modalConfirmDelete-->
<div class="modal fade" id="modalCerrarMesa<?php echo $nro_mesa; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
        <p class="heading">Cerrar Mesa</p>
      </div>

      <form action="consultas/cerrar_mesa.php" method="POST">
        <!--Body-->
        <div class="modal-body">
          <?php if ($total_con_descuento): ?>
            <p>Se guardará en la caja un monto por $<?php echo $total_con_descuento ?> </p>
            <input type="hidden" name="monto" value="<?php echo $total_con_descuento; ?>">
          <?php else: ?>
            <p>Se guardará en la caja un monto por $<?php echo $subtotal_mesa ?> </p>
            <input type="hidden" name="monto" value="<?php echo $subtotal_mesa; ?>">
          <?php endif ?>
          
        
          <i class="fa fa-money fa-4x animated rotateIn"></i>
          
          <div class="form-group mt-2">
            <label for="metodo">Modo de pago:</label>
            <select class="form-control" name="metodo">
              <option>Efectivo</option>
              <option>Tarj Débito</option>
              <option>Tarj Crédito</option>
            </select>
          </div>

          <input type="hidden" name="nro_mesa" value="<?php echo $nro_mesa; ?>">
        </div>
        
        <!--Footer-->
        <div class="modal-footer flex-center">
          <button type="submit" class="btn btn-outline-danger">Aceptar</button>
          <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">Cancelar</a>
        </div>
      </form>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: modalConfirmDelete-->