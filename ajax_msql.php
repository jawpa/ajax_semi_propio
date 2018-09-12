<?php 
	require "conexion2.php";

	// extraemos toda la información del usuario
	$result = mysqli_query($con,"select * from alumnos");
	$alumnosBD = "";

	$alumnosBD .= "<table>";
	$alumnosBD .= "<tr>";
	$alumnosBD .= "<th>Alumno</th>";
	$alumnosBD .= "<th>Puntuación</th>";
	$alumnosBD .= "</tr>";	

	// extraemos a cada fila de la tabla
	while ($row = mysqli_fetch_assoc($result)) {
		//var_dump($row);
		$alumnosBD .= "<tr>";
		$alumnosBD .= "<td>" . $row['alumno'] . "</td>";
		//var_dump($row['alumno']);
		$alumnosBD .= "<td>" . $row['puntuacion'] . "</td>";
		//var_dump($row['puntuacion']);
		$alumnosBD .= "</tr>";		
	}

	$alumnosBD .= "</table>";
	echo($alumnosBD);

	mysqli_close($con);

 ?>