<!-- Modal de agregar producto -->
<div class="modal fade" id="modal_edit_user<?php echo $usuario['id_usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header success-color">
        <p class="heading lead">Editar usuario</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        <form action="<?php ECHO RUTA ?>consultas/edit_user.php?id=<?php echo $usuario['id_usuario']; ?>" id="form-edit-user<?php echo $usuario['id_usuario']; ?>" method="POST">
          <input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario']; ?>">
          <div class="form-group">
            <label for="nombre">Nombre del usuario:</label>
            <input class="form-control" type="text" name="editNombre" id="editNombre<?php echo $usuario['id_usuario']; ?>" value="<?php echo $usuario['nombre']; ?>" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="rol">Rol:</label>
            <select class="form-control" name="rol" selected="Seleccionar Rol" required>
              <option value="">Seleccionar rol</option>
              <?php foreach ($roles as $edit_rol): ?>
                <option value="<?php echo $edit_rol['id'] ?>"><?php echo $edit_rol['rol'] ?></option>
              <?php endforeach ?>
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