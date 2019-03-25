<!--Modal: BORRAR USUARIO-->
<div class="modal fade" id="modal_delete_user<?php echo $producto['id_producto']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
        <p class="heading">¿Estás seguro que quieres borrar el usuario?</p>
      </div>

      <!--Body-->
      <div class="modal-body">
        <p>¡Esta acción es irreversible!</p>

        <i class="fa fa-times fa-4x animated rotateIn"></i>

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
        <a href="consultas/borrar_usuario.php?id=<?php echo $usuario['id_usuario']; ?>" class="btn btn-outline-danger">Si</a>
        <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Fin Modal: BORRAR USUARIO-->