
<!-- Modal de agregar producto -->
<div class="modal fade" id="productos_por_cat_<?php echo $categoria['nombre']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header info-color">
        <p class="heading lead"><?php echo $categoria['nombre']; ?></p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        <?php require 'consultas/productos_por_categoria.php' ?>
        <div class="d-flex flex-wrap justify-content-center">
          <!-- Si hay productos los muestro: -->
          <?php if ($productos_por_cat): ?>
            <?php foreach ($productos_por_cat as $producto): ?>
          <a data-dismiss="modal" name="producto_modal" data-producto="<?php echo $producto['nombre']; ?>" data-precio="<?php echo $producto['precio']; ?>" data-id="<?php echo $producto['id_producto']; ?>" data-categoria="<?php echo $producto['categoria']; ?>" class="btn blue darken-2 white-text btn-productos-menu"><?php echo $producto['nombre']; ?></a>
            <?php endforeach ?>
          <?php else: ?>
            <h4 class="text-center lead">No hay productos registrados en esa categoría</h4 class="text-center titulo">
          <?php endif ?>
          
        </div>
        
      </div>

      
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Central Modal Medium Info-->