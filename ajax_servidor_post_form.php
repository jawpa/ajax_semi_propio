<?php 
	// recibe la información del formulario
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	
	// si las variables están vacías
	if (empty($nombre) || empty($apellido)) {
		echo "por favor, ingrese su nombre y su apellido";
	}else{
		echo "Bienvenido " . $nombre . " " . $apellido . "!";
	}
 ?>