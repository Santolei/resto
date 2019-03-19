<!-- Modal de agregar comentario -->
        <div class="modal fade" id="modal_add_comentario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-notify modal-info" role="document">
            <!--Content-->
            <div class="modal-content">
              <!--Header-->
              <div class="modal-header">
                <p class="heading lead">Agregar Comentario</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" class="white-text">&times;</span>
                </button>
              </div>

              <!--Body-->
              <div class="modal-body">
                <form id="form-add-comment" action="consultas/add_comment.php" method="POST">
                  <input type="hidden" name="id_producto"id="id_modal" value="">
                  <input type="hidden" name="nro_mesa" id="nro_mesa_modal" value="">
                  
                  <div class="form-group">
                    <textarea class="form-control" name="comentarios"></textarea>
                  </div>
                  <!--Footer-->
                <div class="modal-footer justify-content-center">
                  <button class="btn info-color-dark white-text" type="submit">Guardar</button>
                  <a class="btn btn-outline-info waves-effect" data-dismiss="modal">Cancelar</a>
                </div>
                </form>
              </div>
            </div>
            <!--/.Content-->
          </div>
        </div>
        <!-- Fin modal Agregar comentario-->