<?php 
if (isset ($_POST['nombre_negocio']) AND (!empty($_POST['nombre_negocio']))) {
	$nombre_negocio = $_POST['nombre_negocio'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$cuit = $_POST['cuit'];
	$web = $_POST['web'];


	// Ruta donde se guardarán las imágenes que subamos
	$directorio = $_SERVER['DOCUMENT_ROOT'].'/resto/public/img/uploads/';

	// Recibo los datos de la imagen
	if (isset($_FILES['logo'])) {
		$nombre_img = $_FILES['logo']['name'];
		$tipo = $_FILES['logo']['type'];
		$tamano = $_FILES['logo']['size'];

		//Si existe imagen y tiene un tamaño correcto
		if (($nombre_img == !NULL) && ($_FILES['logo']['size'] <= 200000)) 
		{
		   //indicamos los formatos que permitimos subir a nuestro servidor
		   if (($_FILES["logo"]["type"] == "image/gif")
		   || ($_FILES["logo"]["type"] == "image/jpeg")
		   || ($_FILES["logo"]["type"] == "image/jpg")
		   || ($_FILES["logo"]["type"] == "image/png"))
		   {
		      
		      // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
		      move_uploaded_file($_FILES['logo']['tmp_name'],$directorio.$nombre_img);

		      // Inserto los datos del form y la ruta de la imagen en la base de datos
		      $statement = $con->prepare("
				UPDATE perfil
				SET nombre_negocio = '$nombre_negocio',
				direccion = '$direccion',
				telefono = '$telefono',
				cuit = '$cuit',
				web = '$web',
				logo ='/resto/public/img/uploads/$nombre_img'
				");

				$statement->execute();
		    } 
		    else 
		    {
		       //si no cumple con el formato
		       echo "No se puede subir una imagen con ese formato ";
		    }
		} 
		else
		{
		   //si existe la variable pero se pasa del tamaño permitido
		   if($nombre_img == !NULL) echo "La imagen es demasiado grande "; 
		}
	} 
	// Inserto los datos del form y la ruta de la imagen en la base de datos
      $statement = $con->prepare("
		UPDATE perfil
		SET nombre_negocio = '$nombre_negocio',
		direccion = '$direccion',
		telefono = '$telefono',
		cuit = '$cuit',
		web = '$web'
		");

		$statement->execute();
	
}

 ?>