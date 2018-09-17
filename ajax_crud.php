<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="ajax_crud.css">
</head>
<body>
	<div id="overlay"></div>
	<div id="nuevaVentana">
		<div id="box-header"></div>
		<button id="botonCerrar" onmousedown="ejecutarNuevaVentana()"></button><br><br><br>
		<label>Nombre:</label><input type="text" id="nuevoAlumno"><br><br>
		<label>Puntuación:</label><input type="text" id="nuevaPuntuacion"><br><br>
		<button onmousedown="agregarAlumno()" style="margin-left: 40%;" class="btn btn-primary">Agregar Alumno</button>
	</div>

	<!-- envoltura -->
	<div id="wrapper">
		<div id="info"></div>
	</div>

	<script>
		function mostrarAlumnos() {
			var xmlhttp = new XMLHttpRequest();

			xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
					document.getElementById('info').innerHTML = this.responseText;
				}	
			};

			xmlhttp.open("GET","ajax_crud_b.php?alumnos=" + "alumnos",true);
			xmlhttp.send();
		}

		mostrarAlumnos();


		function editarAlumno(alumnoID) {
			console.log(alumnoID);
			// lo concatenamos con el parámetro
			var nombreID = "nombreID" + alumnoID;
			var puntuacionID = "puntuacionID" + alumnoID;
			var borrar = "borrar" + alumnoID;
			var actualizar = "actualizar" + alumnoID;
			var editarNombreID = nombreID + "-editar";

			// obtenemos el texto del nombre de este alumno con innerHTML
			$nombreAlumno = document.getElementById(nombreID).innerHTML;
			
			// cuando hagamos click en editar, el nombre tiene que aparecer en un input-text para poder reescribirlo
			

			// seleccionamos al elemento padre (la columna del nombre(td) mediante su id)
			// será padre del input-text que editará el nombre
			var parent = document.querySelector("#" + nombreID);

			// analizamos una condición de parent
			// si no existe el input-text con la id indicada
			// ponemos al input-text con el nombre del usuario, desabilitamos botón borrar, mostramos el botón actualizar para esta columna
			if (parent.querySelector("#" + editarNombreID) === null) {
				// seleccionamos al td padre y le inyectamos el input con el nombre como contenido y un id
				document.getElementById(nombreID).innerHTML = "<input type='text' id='"+ editarNombreID +"' value='" + $nombreAlumno + "'>";
				document.getElementById(borrar).disabled = "true";
				document.getElementById(actualizar).style.display = "block";
			}
		}


		function actualizarAlumno(alumnoID) {
			var xmlhttp = new XMLHttpRequest();
			// seleccionamos al contenido del input-text que queremos actualizar
			var nombreActualizado = document.getElementById("nombreID" + alumnoID + "-editar").value;
			console.log(nombreActualizado);

			// treamos a todos los alumnos
			xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
					mostrarAlumnos();
				}
			}
			// le pasamos el id del alumno que actualizamos, con el nombre actualizado
			xmlhttp.open("get","ajax_crud_b.php?idAlumnoActualizado=" + alumnoID + "&nombreActualizado=" + nombreActualizado, true);
			xmlhttp.send();
		}


		function borrarAlumno(alumnoID) {
			var respuesta = confirm("Estás seguro de borrar a este usuario?");
			if (respuesta) {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {
					// mostramos a todos los alumnos
					if (this.readyState === 4 && this.status === 200) {
						mostrarAlumnos();
					}
				};

				xmlhttp.open("get","ajax_crud_b.php?idAlumnoEliminado=" + alumnoID,true);
				xmlhttp.send();
			}
		}

		// almacenamos la parte opaca
		var overlay = document.getElementById("overlay");
		// almacenamos a la nueva ventana
		var nuevaVentana = document.getElementById("nuevaVentana");

		function ejecutarNuevaVentana() {
			// damos estilo a la parte opaca
			overlay.style.opacity = .5;

			// al ejecutar la función:
			// si está presenta la ventana que desaparezca
			// si no está que aparezca
			if (overlay.style.display == "block") {
				overlay.style.display = "none";
				nuevaVentana.style.display = "none";
			}else{
				overlay.style.display = "block";
				nuevaVentana.style.display = "block";
			}

			// nos aseguramos que estén vacíos los input para la puntuación y el nombre de la nueva ventana al ejecutar la función
			document.getElementById("nuevoAlumno").value = "";
			document.getElementById("nuevaPuntuacion").value = "";

		}


		function agregarAlumno() {
			// al ingresar el nuevo alummno, ocultamos la columna
			overlay.style.display = "none";
			nuevaVentana.style.display = "none";

			var xmlhttp = new XMLHttpRequest();

			var nuevoAlumno = document.getElementById('nuevoAlumno').value;
			var nuevaPuntuacion = document.getElementById('nuevaPuntuacion').value;

			xmlhttp.onreadystatechange = function () {
				if(this.readyState === 4 && this.status === 200){
					// si todo sale bien, mostramos la lista de usuarios con el nuevo usuario insertado
					mostrarAlumnos();
				}
			}

			// le pasamos los datos del nuevo alumno al servidor
			xmlhttp.open("get","ajax_crud_b.php?nuevoAlumno=" + nuevoAlumno + "&nuevaPuntuacion=" + nuevaPuntuacion,true);
			xmlhttp.send();
		}





	</script>
</body>
</html>