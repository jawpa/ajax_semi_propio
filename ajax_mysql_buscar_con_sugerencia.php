<?php 
	require 'conexion2.php';

	$nombre  = $_GET['nombre'];
	

	// si el nombre ingresado por el usuario no se encuentra vacío
	if(!empty($nombre)){
		// verificamos que no tengas caracteres especiales
		$alumno = mysqli_real_escape_string($con,$nombre);
		
		// obtenemos el nombre de los usuarios que contengan los caracteres ingresados por el usuario
		$resultado = mysqli_query($con,"select * from alumnos where alumno like '%" . $alumno . "%'");

		var_dump($resultado);
		// imprimimos a los alumnos que contengan el nombre ingresado por los usuarios
		while ($row = mysqli_fetch_assoc($resultado)) {
			echo $row['alumno'] . " ";
		}
	}


 ?>