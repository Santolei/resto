<?php 
$titulo = "Ingresar"
 ?>
<?php require 'head.php'; ?>

<body class="d-flex justify-content-center align-items-center">
	
	<div class="bg d-flex justify-content-center align-items-center">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="login" class="contenedor-login">
		
			<img class="mb-4 mt-4" src="public/img/logo.png" alt="logo">
			<div class="form-group">
				<input type="text" name="usuario" class="form-control" placeholder="Usuario" required>
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Contraseña" required>
			</div>
		
			<div class="form-group d-flex justify-content-center">
				<button class="btn purple-gradient mt-4 white-text" onclick="login.submit()" style="border-radius:8px;">Ingresar <i class="fa fa-arrow-circle-o-right"></i></button>
			</div>
		
			<?php if(!empty($errores)): ?>
				<div class="white-text alert danger-color animated bounceIn">
					<div class="m-0 text-center">
						<?php echo $errores; ?>
					</div>
				</div>
			<?php endif; ?>
		</form>
	</div>

	<!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="public/js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="public/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="public/js/mdb.min.js"></script>
    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
    </script>
</body>
</html>