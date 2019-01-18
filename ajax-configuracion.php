<!--Main Navigation-->

    <form action="configuracion.php" class="config-form w-100" method="post" enctype="multipart/form-data">
        <!--Main layout-->
        <main id="main" class="pt-5">
            <div class="container-fluid mt-4 pt-2">
                    <div class="card mb-4 d-flex justify-content-center text-center">
                    <h4 class="m-4">
                        <strong class="titulo-seccion">Configuración</strong>
                    </h4>
                </div>
                
                    <div class="row">
                        <!--Grid column-->
                        <div class="col-12 col-md-6 mb-4">
                    
                            <!--Card-->
                            <div class="card ">
                    
                                <!-- PERFIL -->
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-center mb-4">
                    
                                        <h5 class="mb-2 mb-sm-0 pt-1">
                                            <span>Perfil del negocio</span>
                                        </h5>
                    
                                    </div>

                                    <hr class="mdb-color lighten-3">  
                                    
                                    <div class="row">
                                        <div class="col-12">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <label for="nombre_negocio" class="col-6">Nombre del negocio:</label>
                                                    <input type="text" name="nombre_negocio" class="form-control mb-2 col-6" value="<?php echo $nombre_negocio ?>">
                                                </div>

                                                <div class="d-flex justify-content-center align-items-center">
                                                    <label for="direccion" class="col-6">Dirección:</label>
                                                    <input type="text" name="direccion" class="form-control mb-2 col-6" value="<?php echo $direccion ?>">
                                                </div>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <label for="telefono" class="col-6">Teléfono:</label>
                                                    <input type="text" name="telefono" class="form-control mb-2 col-6" value="<?php echo $telefono ?>">
                                                </div>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <label for="cuit" class="col-6">Cuit/Cuil:</label>
                                                    <input type="text" name="cuit" class="form-control mb-2 col-6" value="<?php echo $cuit ?>">
                                                </div>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <label for="web" class="col-6">Web:</label>
                                                    <input type="text" name="web" class="form-control mb-2 col-6" value="<?php echo $web ?>" >
                                                </div>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <label for="logo" class="col-6">Logo:</label>
                                                    <input type="file" name="logo" id="logo" size="145" class="mb-2 col-6">
                                                </div>
                                                
                                        </div>
                                        <?php if (isset($success)): ?>
                                            <div class="alert alert-success wow fadeIn">Datos Guardados</div>
                                        <?php endif ?>
                                        <?php if (isset($errores)): ?>
                                            <div class="alert alert-danger wow fadeIn"><?php echo $errores ?></div>
                                        <?php endif ?>
                                    </div>
                                </div>
                    
                            </div>
                            <!--/.Card-->
                    
                        </div>
                        <!--Grid column-->
                    
                        <!--Grid column-->
                        <div class="col-12 col-md-6 mb-4">
                    
                            <!--Card-->
                            <div class="card ">
                    
                                <!-- MESAS -->
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-center mb-4">
                    
                                        <h5 class="mb-2 mb-sm-0 pt-1">
                                            <span>Mesas</span>
                                        </h5>
                    
                                    </div>

                                    <hr class="mdb-color lighten-3">  
                                    
                                    <div class="row">
                                        <div class="col-12">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <label for="cant_mesas" class="col-6"> Cantidad de mesas:</label>
                                                    <input type="text" name="cant_mesas" class="form-control mb-2 col-6" value="<?php echo $cant_mesas ?>">
                                                </div>
                                                
                                        </div>
                                        <?php if (isset($success)): ?>
                                            <div class="alert alert-success wow fadeIn">Datos Guardados</div>
                                        <?php endif ?>
                                        <?php if (isset($errores)): ?>
                                            <div class="alert alert-danger wow fadeIn"><?php echo $errores ?></div>
                                        <?php endif ?>
                                    </div>
                                </div>
                    
                            </div>
                            <!--/.Card-->
                    
                        </div>
                        <!--Grid column-->
                    </div>
                
                <div class="text-center">
                    <button class="btn btn-primary" name="submit" type="submit">Guardar</button>
                </div>
                <div class="output_message"></div>
            </div>
            
        </main>
        <!--Main layout-->
        
    </form>