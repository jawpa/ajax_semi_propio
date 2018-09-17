<?php 
	require 'conexion2.php';

	
	$alumnos = $_GET['alumnos'];
	

	// defino la variable como vacía si no está definida
	$idAlumnoActualizado = isset($_GET["idAlumnoActualizado"]) ? $_GET["idAlumnoActualizado"] : ""; 

	$nombreActualizado = isset($_GET["nombreActualizado"]) ? $_GET["nombreActualizado"] : ""; 

	$idAlumnoEliminado = isset($_GET["idAlumnoEliminado"]) ? $_GET["idAlumnoEliminado"] : ""; 

	$nuevoAlumno = isset($_GET["nuevoAlumno"]) ? $_GET["nuevoAlumno"] : ""; 

	$nuevaPuntuacion = isset($_GET["nuevaPuntuacion"]) ? $_GET["nuevaPuntuacion"] : ""; 	
	 
	
	$nombreID = "nombreID";
	$puntuacionID = "puntuacionID";
	$actualizar = "actualizar";
	$borrar = "borrar";
	$tabla = "";

	if($alumnos === "alumnos"){
		$resultado = mysqli_query($con,"select * from alumnos");
		// le damos estilo boostrap a la tabla
		$tabla .= "<div class='container'>";
		$tabla .= "<table class='table table-striped table-bordered'>";
		$tabla .= "<tr>";
		$tabla .= "<th>Alumno</th>";
		$tabla .= "<th>Nombre</th>";
		$tabla .= "<th>Puntuación</th>";
		$tabla .= "<th>Editar alumno</th>";
		$tabla .= "<th>Borrar alumno</th>";
		$tabla .= "</tr>";
		
		while ($fila = mysqli_fetch_assoc($resultado)) {
			$tabla .= "<tr>";
			$tabla .= "<td>";
			$tabla .= $fila['idAlumno'];
			$tabla .= "</td>";
			// le ponemos un id al nombre, puntuación, botones borrar,editar,actu de c/u
			$tabla .= "<td id='". $nombreID . $fila['idAlumno'] ."'>";
			$tabla .= $fila['alumno'];
			$tabla .= "</td>";
			$tabla .= "<td id='". $puntuacionID . $fila['idAlumno'] ."'>";
			$tabla .= $fila['puntuacion'];
			$tabla .= "</td>";
			$tabla .= "<td>";
			// para poder obtener el atributo id dentro de otro atributo, usamos this.id 
			$tabla .= "<input id='".$fila['idAlumno']."' onclick='editarAlumno(this.id)' type='button' value='editar' class='btn btn-warning'>";
			$tabla .= "</td>";
			$tabla .= "<td>";
			$tabla .= "<input id='". $borrar . $fila['idAlumno'] ."' onclick='borrarAlumno(".$fila['idAlumno'].")' type='button' value='borrar' class='btn btn-danger'>";
			$tabla .= "</td>";
			$tabla .= "<td>";
			// lo escondemos con el atributo display none
			// sólo necesitamos pasar el número de id
			$tabla .= "<input id='". $actualizar . $fila['idAlumno'] ."' type='button' value='actualizar' onclick='actualizarAlumno(".$fila['idAlumno'].")' class='btn btn-success'  style='display:none;'>";
			$tabla .= "</td>";
			$tabla .= "</tr>";	
		}

		$tabla .= "</table>";
		$tabla .= "<button onclick='ejecutarNuevaVentana()' class='btn btn-info'>Agregar Alumno</button>";
		$tabla .= "</div>";
		echo $tabla;
		mysqli_close($con);

	}


	// si el nombre actualizado no está vacío
	if(!empty($nombreActualizado)){
		// verificamos que no tenga caracteres especiales
		$nombreActualizado2 = mysqli_real_escape_string($con,$nombreActualizado);
		// actualizamos a la base de datos
		var_dump($nombreActualizado2);
		$resultado = mysqli_query($con, "update alumnos set alumno = '$nombreActualizado2' where idAlumno = $idAlumnoActualizado");

		mysqli_close($con);
	}


	// si la id del alumno eliminado no está vacía
	if(!empty($idAlumnoEliminado)){
		
		$resultado = mysqli_query($con, "delete from alumnos where idAlumno = $idAlumnoEliminado");
		mysqli_close($con);
		alert("se ha eliminado al alumno id:$idAlumnoEliminado");
	}


	if (!empty($nuevoAlumno) && !empty($nuevaPuntuacion)) {
		// verificamos que no tengamos caracteres especiales
		$nuevoAlumno2 = mysqli_real_escape_string($con,$nuevoAlumno);
		$nuevaPuntuacion2 = mysqli_real_escape_string($con,$nuevaPuntuacion);
		// insertamos los datos en la base de datos
		$resultado = mysqli_query($con, "insert into alumnos values ('','$nuevoAlumno2','$nuevaPuntuacion2')");

		mysqli_close($con);
	}

	

 ?>