<!-- Modal de agregar producto -->
<div class="modal fade" id="modal_edit_producto<?php echo $producto['id_producto']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header success-color">
        <p class="heading lead">Editar producto</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        <form action="consultas/edit_producto.php" id="form-add-producto" method="POST">
          <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
          <div class="form-group">
            <label for="nombre">Nombre del producto:</label>
            <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $producto['nombre']; ?>" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="precio">Precio:</label>
            <input class="form-control" type="text" name="precio" id="precio" value="<?php echo $producto['precio']; ?>" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="categoria">Categoría:</label>
            <input class="form-control" type="text" name="categoria" id="categoria" value="<?php echo $producto['categoria']; ?>" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="stock">Stock:</label>
            <input class="form-control" type="number" name="stock" id="stock" value="<?php echo $producto['stock']; ?>" autocomplete="off">
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