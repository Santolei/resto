<!-- Modal de agregar producto -->
<div class="modal fade" id="modal_add_producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading lead">Agregar nuevo producto</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        <form action="consultas/add_categoria.php" id="form-add-producto" method="POST">
          <div class="form-group">
            <label for="nombre">Nombre de la categoría:</label>
            <input class="form-control" type="text" name="nombre" id="nombre" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="precio">Precio:</label>
            <input class="form-control" type="text" name="precio" id="precio" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="categoria">Categoría:</label>
            <input class="form-control" type="text" name="categoria" id="categoria" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="stock">Stock:</label>
            <input class="form-control" type="number" name="stock" id="stock" autocomplete="off">
          </div>
          <!--Footer-->
        <div class="modal-footer justify-content-center">
          <button class="btn info-color-dark white-text" type="submit">Guardar</button>
          <a class="btn btn-outline-info waves-effect" data-dismiss="modal">Salir</a>
        </div>
        </form>
      </div>

      
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Fin modal Agregar producto-->