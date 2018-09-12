<?php 

	require 'conexion2.php';

	//$nombre = $_GET['nombre'];

	// para evitar el warning, antes de escribir en el cuadrado te texto y, por lo tanto, antes de que llame a la función buscarAlumno y tenga contenido $_GET["nombre"], le damos un contenido a la variable nombre
	$nombre = isset($_GET["nombre"]) ? $_GET["nombre"] : ""; 


	// si el cuadro de texto no está vacío
	if (!empty($nombre)) {
		$alumno = mysqli_real_escape_string($con,$nombre);
		
		// seleccionamos a todos los nombres que incluyan el nombre que el usuario puso
		$resultado = mysqli_query($con,"select * from alumnos where alumno like '%". $alumno ."%'");

		// mostramos los nombres de los alumnos que estén incluidos en el texto
		while ($fila = mysqli_fetch_assoc($resultado)) {
			// le pasamos como parámetro el elemento que está siendo utilizado
			echo '<div onclick="toggleOverlay(this)">' . $fila['alumno'] . "</div><br>";
			echo '<input type="hidden"  value="'. $fila['puntuacion'] . '"><br><br>';
		}

		mysqli_close($con);
	
	}else{
		// si el cuadro de texto está vacío, mostramos a todos los nombres
		mostrarAlumnos();
	}

	

	function mostrarAlumnos()
	{
		require 'conexion2.php';

		// traemos a todos los datos
		$resultado = mysqli_query($con,"select * from alumnos");

		// imprimimos sólo los nombres de los alumnos
		while ($fila = mysqli_fetch_assoc($resultado)) {
			echo '<div onclick="toggleOverlay(this)">' . $fila['alumno'] . "</div><br>";
			echo '<input type="hidden" value="'. $fila['puntuacion'] . '"><br><br>';
		}

		mysqli_close($con);
	}

	

 ?>