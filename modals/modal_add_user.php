<!-- Modal de agregar producto -->
<div class="modal fade" id="modal_add_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading lead">Crear nuevo usuario</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        <form action="consultas/add_user.php" id="form-add-user" method="POST">
          <div class="form-group">
            <label for="nombre">Nombre del usuario:</label>
            <input class="form-control" type="text" name="nombre" id="nombre" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="rol">Rol:</label>
            <select class="form-control" name="rol" id="rol" selected="Seleccionar Rol" required>
              <option value="">Seleccionar rol</option>
              <?php foreach ($roles as $rol): ?>
                <option value="<?php echo $rol['id'] ?>"><?php echo $rol['rol'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label for="password">Contraseña:</label>
              <input class="form-control" type="password" name="password" id="password">
              <div class="valid-feedback">
                Looks good!
              </div>
          </div>

          <div class="form-group">
            <label for="password2">Repetir contraseña:</label>
            <input class="form-control" type="password" name="password2" id="password2" placeholder="Repetir contraseña">
          </div>
          <!--Footer-->
        <div class="modal-footer justify-content-center">
          <button class="btn info-color-dark white-text" type="submit">Crear</button>
          <a class="btn btn-outline-info waves-effect" data-dismiss="modal">Salir</a>
        </div>
        </form>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Fin modal Agregar producto-->