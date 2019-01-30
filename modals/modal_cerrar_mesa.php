<!--Modal: modalConfirmDelete-->
<div class="modal fade" id="modalCerrarMesa<?php echo $nro_mesa; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
        <p class="heading">¿Estás seguro que quieres cerrar la mesa?</p>
      </div>

      <!--Body-->
      <div class="modal-body">
        <p>Se guardará en la caja el valor $ valor de la cuenta</p>

        <i class="fa fa-times fa-4x animated rotateIn"></i>

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
        <a href="consultas/cerrar_mesa.php?id=<?php echo $nro_mesa; ?>" class="btn btn-outline-danger">Si</a>
        <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: modalConfirmDelete-->