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
        <form action="consultas/abrir_mesa.php?id=<?php echo $mesa['nro_mesa'] ?>" method="POST" id="modal-mesa">
        	<?php if ($mesa['estado'] === 'Disponible'): ?>
        		<div class="custom-control custom-checkbox">
				    <input type="checkbox" class="custom-control-input" id="abrirMesa<?php echo $mesa['nro_mesa'] ?>" name="abrirMesa" value="Ocupada">
				    <input type="hidden" name="nro_mesa" value="<?php echo $mesa['nro_mesa'] ?>" />

				    <label class="custom-control-label" for="abrirMesa<?php echo $mesa['nro_mesa'] ?>">Abrir mesa</label>

            <div class="badge badge-success pull-right"> Mesa disponible</div>
				</div>
        	<?php endif ?>

    			<?php if ($mesa['estado'] === 'Ocupada'): ?>
    				<div class="custom-control custom-checkbox">
    				    <input type="checkbox" class="custom-control-input" id="cerrarMesa<?php echo $mesa['nro_mesa'] ?>" name="cerrarMesa" value="Disponible">
    				    <input type="hidden" name="nro_mesa" id="numeroDeMesa" value="<?php echo $mesa['nro_mesa'] ?>" />

    				    <label class="custom-control-label" for="cerrarMesa<?php echo $mesa['nro_mesa'] ?>"><input type="checkbox" class="custom-control-input" id="cerrarMesa<?php echo $mesa['nro_mesa'] ?>" name="cerrarMesa" value="Disponible">Cerrar mesa</label>
                <div class="badge badge-danger pull-right"> Mesa Ocupada</div>
    				</div>

            <hr>

            <div class="d-flex justify-content-center">
              <a class="btn btn-modal stylish-color-dark" href="ver_cuenta.php?id=<?php echo $mesa['nro_mesa'] ?>">Ver Cuenta</a>
              <a class="btn btn-modal stylish-color-dark" href="mesa.php?id=<?php echo $mesa['nro_mesa'] ?>">Pedidos</a>
            </div>
    			<?php endif ?>

    			<div class="modal-footer mt-4">
            <button type="button" class="btn purple-gradient" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" name="submit">Guardar Datos</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>




