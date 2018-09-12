<?php 
	require "conexion2.php";

	// obtenemos el id del alumno vía método get
	$idAlumno = $_GET['alumno'];

	// lo parseamos a entero
	$idAlumno = (int)$idAlumno;

	// extraemos la información del usuario específico
	$result = mysqli_query($con,"select * from alumnos where idAlumno = $idAlumno");
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