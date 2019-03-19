<!-- Modal -->
<div class="modal fade" id="modalMesa<?php echo $mesa['nro_mesa']?>" tabindex="-1" aria-labelledby="ModalMesaLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalMesaLabel">Mesa <?php echo $mesa['nro_mesa'] ?>: <?php echo $mesa['estado'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="consultas/abrir_mesa.php?id=<?php echo $mesa['nro_mesa'] ?>" method="POST" id="modal-mesa<?php echo $mesa['nro_mesa'] ?>">
        	<?php if ($mesa['estado'] === 'Disponible'): ?>
        		<div class="d-flex justify-content-between align-items-center">
  				    <a class="logo-wrapper waves-effect">
                  <img src="public/img/logo.png" style="width:100px;" alt="">
              </a>
              <input type="hidden" name="nro_mesa" id="numeroDeMesa<?php echo $mesa['nro_mesa']?>" value="<?php echo $mesa['nro_mesa'] ?>" />
              <div class="badge badge-success pull-right p-2"> Mesa disponible</div>
  				</div>
        	<?php endif ?>

    			<?php if ($mesa['estado'] === 'Ocupada'): ?>
    				<div class="custom-control custom-checkbox">
    				    <input type="hidden" name="nro_mesa" id="numeroDeMesa<?php echo $mesa['nro_mesa']?>" value="<?php echo $mesa['nro_mesa'] ?>" />
                <div class="badge badge-danger pull-right p-2"> Mesa Ocupada</div>
    				</div>

            <hr>

            <div class="d-flex justify-content-center">
              <a class="btn stylish-color-dark w-100 mr-0" href="ver_cuenta.php?id=<?php echo $mesa['nro_mesa'] ?>">Ver Cuenta</a>
              <a class="btn stylish-color-dark w-100" href="mesa.php?id=<?php echo $mesa['nro_mesa'] ?>">Pedidos</a>
            </div>
    			<?php endif ?>

    			<div class="modal-footer pl-0 pr-0 d-flex flex-column-reverse flex-sm-row justify-content-center mt-4">
              <button type="button" class="btn purple-gradient w-100" data-dismiss="modal">Cerrar</button>
            <?php if ($mesa['estado'] === 'Disponible'): ?>
              <button type="submit" class="btn btn-primary w-100" name="submit">Abrir Mesa</button>
            <?php endif ?>
            <?php if ($mesa['estado'] === 'Ocupada'): ?>
              
            <?php endif ?>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>




