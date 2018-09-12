<?php 
	$personas = array('Ana','Alberto','Beto','Cindy','David','Esteban','Fiorela','Gisela','Henry','Irma','Jeferson','Katy','Liz','Nancy','Oscar','Pedro','Amelia','Rocio', 'Doris','Erica','Emilia','Susan','Teresa','Ursula','Victor','Liliana','Ernesto','Willy','Viviana');

	// recibimos el nombre del formulario
	$nombre = $_GET["nombre"];

	$sugerencia = "";

	if ($nombre !== "") {
		$nombre = strtolower($nombre);
		$cantidadCaracteres = strlen($nombre);

		foreach ($personas as $persona) {
			// devuelve una cadena recorriendo los elementos del array
			// del tamaño del nombre ingresado
			// empezando por el inicio
			$nombreEnServidor = substr($persona,0,$cantidadCaracteres);

			// verificamos si una cadena se encuentra dentro de otra
			// si el nombre ingresado en el formulario está incluido en los nombres del servidor
			if (stristr($nombre, $nombreEnServidor) !== false) {
				// si sugerencia está vacía, le peonemos el nombre del servidor que toca del recorrido
				if($sugerencia === ""){
					$sugerencia = $persona;
				}else{
					// si ya tiene un nombre, le concatenamos el nombre del servidor que toca
					$sugerencia .= ", $persona"; 
				}

			}
		}
	}
	// mostramos las sugerencias
	// si está vacía, le ponemos un mensaje alusivo
	echo $sugerencia === "" ? "no fue encontrado" : $sugerencia
 ?>