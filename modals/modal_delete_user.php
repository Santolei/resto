<!-- Modal: BORRAR USUARIO
AGUANTE EL WOW VIEJA -->
<div class="modal fade modal_delete_user" id="modal_delete_user<?php echo $usuario['id_usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
        <p class="heading">¿Estás seguro que quieres borrar el usuario <?php echo $usuario['nombre'] ?>?</p>
      </div>

      <!--Body-->
      <div class="modal-body">
        <p>¡Esta acción es irreversible!</p>

        <i class="fa fa-times fa-4x animated rotateIn"></i>

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
        <a data-usuario="<?php echo $usuario['id_usuario']; ?>" class="btn btn-outline-danger btn-delete-user">Si</a>
        <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Fin Modal: BORRAR USUARIO-->