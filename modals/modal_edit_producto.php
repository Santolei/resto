<!-- Modal de editar producto -->
<div class="modal fade" id="modal_edit_producto<?php echo $producto['id_producto']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header info-color">
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
            <input class="form-control" type="number" name="precio" id="precio" value="<?php echo $producto['precio']; ?>" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="categoria">Categoría:</label>
            <select class="form-control" name="categoria" id="categoria" selected="<?php echo $producto['categoria']; ?>">
             
              <?php foreach ($categorias as $categoria): ?>
                <option value="<?php echo $categoria['nombre'] ?>" 
                  <?php if ($producto['categoria'] == $categoria['nombre']): ?>
                  <?php echo 'selected' ?>
                  <?php endif ?>
                  ><?php echo $categoria['nombre'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label for="stock">Stock:</label>
            <input class="form-control" type="number" name="stock" id="stock" value="<?php echo $producto['stock']; ?>" autocomplete="off">
          </div>

          <!-- Default checked -->
          <div class="custom-control custom-checkbox">
            <input type="checkbox" onclick="$(this).val(this.checked ? 1 : 0)" value="1" name="estado" class="custom-control-input" id="defaultChecked2" <?php if ($producto['estado'] == '1'): ?>
              checked
            <?php else: ?>
              
            <?php endif ?> >
            <label class="custom-control-label" for="defaultChecked2">Mostrar en el menú</label>
          </div>
          <!--Footer-->
        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn info-color white-text">Guardar</button>
          <a class="btn btn-outline-info waves-effect" data-dismiss="modal">Salir</a>
        </div>
        </form>
      </div>

      
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Central Modal Medium Info-->