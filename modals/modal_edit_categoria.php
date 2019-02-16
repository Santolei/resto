<!-- Modal de editar producto -->
<div class="modal fade" id="modal_edit_categoria<?php echo $categoria['id_categoria']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header info-color">
        <p class="heading lead">Editar categoría</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        <form action="consultas/edit_categoria.php" id="form-add-producto" method="POST">
          <div class="form-group">
            <label for="nombre">Nombre de la categoría:</label>
            <input type="hidden" name="id_categoria" value="<?php echo $categoria['id_categoria']; ?>">
            <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $categoria['nombre']; ?>" autocomplete="off" required>
          </div>
          <!--Footer-->
        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn info-color white-text">Guardar</button>
          <a class="btn btn-outline-info waves-effect" data-dismiss="modal">Cancelar</a>
        </div>
        </form>
      </div>

      
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Central Modal Medium Info-->