<script>
        // traigo los pedidos

        // Buscador

        function buscar_ajax(cadena){
            $.ajax({
            type: 'POST',
            url: 'consultas/search.php',
            data: 'cadena=' + cadena,
            success: function(respuesta) {
                //Copiamos el resultado en #mostrar
                $('#mostrar').html(respuesta);
                if($('#mostrar').html()) {
                    
                } else {    
                    $('#mostrar').html('<p>No hay ningún producto registrado con ese nombre</p>');
                }
                
               }
            });
        }


        // SELECCIONO PRODUCTO DEL BUSCADOR Y LO PASO AL INPUT

        $( '#mostrar' ).on( 'click', 'a', function () {
        $('input[name="buscar"]').val('');
        $('input[name="producto"]').val($(this).attr('data-nombre'));
        $('input[name="categoria"]').val($(this).attr('data-categoria'));
        $('input[name="cantidad"]').val(1);
        $('input[name="precio"]').val($(this).attr('data-precio'));
        $('input[name="id_producto"]').val($(this).attr('data-id'));
        $('#form-add-productos').trigger('submit');
        $('#mostrar').html("<div class='m-0 animated slower delay-2s fadeOut'>Producto agregado</div>");
    });

        $(".btn-productos-menu").on('click', function () {
            $('input[name="producto"]').val($(this).attr('data-producto'));
            $('input[name="categoria"]').val($(this).attr('data-categoria'));
            $('input[name="cantidad"]').val(1);
            $('input[name="precio"]').val($(this).attr('data-precio'));
            $('input[name="id_producto"]').val($(this).attr('data-id'));
            $('#form-add-productos').trigger('submit');
            
        });
    // Mostrando productos en la tabla
    function mostrarPedidos(){
        $.ajax({
        type: 'POST',
        url: 'consultas/pedidos_ajax.php?id=<?php echo $nro_mesa ?>',
        data: this.serialize,
        success: function(data) {
            //Copiamos el resultado en #tabla-pedidos
            $('#tabla-pedidos').html(data);
           }
        });
    }

     // Mostrandoel total en la tabla
    function mostrarTotal(){
        $.ajax({
        url: 'consultas/mostrar_total.php?id=<?php echo $nro_mesa ?>',
        success: function(data) {
            //Copiamos el resultado en #tabla-pedidos
            $('#total_mesa').html(data);
           }
        });
    }

    // Agregando productos

    $('#form-add-productos').on('submit',function(){
             
        var form = $(this);
        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            success: function(){
              mostrarPedidos();
              mostrarTotal();
            }
        });
         
        // Prevents default submission of the form after clicking on the submit button. 
        return false;   
    });

    // Borrar pedido
    function borrarPedido(id){
            $.ajax({
                url: "consultas/borrar_pedido.php?id="+id,
                success: function(){
                  mostrarPedidos();
                  mostrarTotal();
                  mostrarComentarios(<?php echo $nro_mesa ?>);
                }
            });
    }

    // Sumar +1 al pedido

    function sumarPedido(id){
            $.ajax({
                url: "consultas/edit_cantidad_mas.php?id="+id,
                success: function(){
                  mostrarPedidos();
                  mostrarTotal();
                }
            });
    }

    // Restar 1 al pedido

    function restarPedido(id){
            $.ajax({
                url: "consultas/edit_cantidad_menos.php?id="+id,
                success: function(){
                  mostrarPedidos();
                  mostrarTotal();
                }
            });
    }

    // Mostrar comentarios 

     function mostrarComentarios(id){
        $.ajax({
            url: "consultas/pedidos_comentarios.php?id="+id,
            data: this.serialize,
            success: function(data){
               $('#comentarios_ajax').html(data);
            }
        });
    }

    // Haciendo focus en el textarea

    $(document).ready(function(){
        $("#modal_add_comentario").on('shown.bs.modal', function(){
            $(this).find('textarea').focus();
        });
    });

    // Agregar comentarios

    function addComment(id){
        
        $('input[name="id_producto"]').val(id);
        $('input[name="nro_mesa"]').val(<?php echo $nro_mesa ?>);
        // FALTA ARREGLAR ESTO
        $('#nombre_producto_modal').html(id);
    }

    // Agregando comentarios 

     $('#form-add-comment').on('submit',function(e){
        e.preventDefault(); 
        var form = $('#form-add-comment');
        $('#modal_add_comentario').modal('hide');
        // $('.modal-backdrop').remove();
        // $('body').removeClass('modal-open');
        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            success: function(){
             mostrarComentarios(<?php echo $nro_mesa ?>);
             setInterval(mostrarPedidos(), 200);
             $('#form-add-comment textarea').val('');
            }
        });
         
        // Prevents default submission of the form after clicking on the submit button. 
        return false;   
    });
   
    // Boton de imprimir comanda:

    $(document).ready(function() {
        mostrarPedidos();
        mostrarTotal();
        mostrarComentarios(<?php echo $nro_mesa ?>);

        $('#imprimir').on('click',function(){
            $.ajax({
                    url:   "imprimir_comanda/index.php?id=<?php echo $nro_mesa ?>", //archivo que recibe la peticion
                    type:  'post'
            });  
        });

        // Imprimir comanda individual

        // $('.imp-individual').on('click',function(){
        //     var producto = $(this).attr('data-producto');
        //     var cantidad = $(this).attr('data-cantidad');
        //         console.log(producto);
        //         console.log(cantidad);
        // });
    });

    

    function impComandaInd(){
        
        // $.ajax({
        //     url:  "imprimir_comanda_ind/index.php?producto=" + producto +"&cantidad=" + cantidad, 
        //     type:  'GET',
        //     success: function(){
        //         console.log('funciona');
        //     }
        // });
       console.log($('.imp-individual').attr('data-producto'));
    }

    </script>