
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
          <?php foreach ($productos_por_cat as $producto): ?>
          <a data-dismiss="modal" name="producto_modal" data-producto="<?php echo $producto['nombre']; ?>" data-precio="<?php echo $producto['precio']; ?>" data-id="<?php echo $producto['id_producto']; ?>" class="btn blue darken-2 white-text btn-productos-menu"><?php echo $producto['nombre']; ?></a>

          <script type="text/javascript">
            
            $(".btn-productos-menu").on('click', function () {
            $('input[name="producto"]').val($(this).attr('data-producto'));
            $('input[name="cantidad"]').val(1);
            $('input[name="precio"]').val($(this).attr('data-precio'));
            $('input[name="id_producto"]').val($(this).attr('data-id'));

            
        });
          </script>
        <?php endforeach ?>
        </div>
        
      </div>

      
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Central Modal Medium Info-->