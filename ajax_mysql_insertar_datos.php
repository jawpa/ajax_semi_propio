<?php

	require 'conexion2.php';

	$nombre = $_POST['nombre'];
	$puntuacion = $_POST['puntuacion'];

	if(!empty($nombre) && !empty($puntuacion)){
		// verificamos que no tengan caracteres especiales
		$nombre = mysqli_real_escape_string($con,$nombre);
		$puntuacion = mysqli_real_escape_string($con,$puntuacion);

		// obtenemos el nombre de los usuarios que contengan los caracteres ingresados por el usuario
		$resultado = mysqli_query($con,"insert into alumnos (alumno,puntuacion) values ('$nombre','$puntuacion')");

		echo "Insertaste a el alumno " . $nombre . " que tiene una puntuación de " . $puntuacion ;
		
	}else{
		echo "tenés que llenar el formulario";
	}



 ?>