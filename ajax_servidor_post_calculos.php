<?php 
	// recibe la información del formulario
	$numero1 = $_POST['numero1'];
	$numero2 = $_POST['numero2'];
	
	// si las variables están vacías
	if (empty($numero1) || empty($numero2)) {
		echo "por favor, ingrese los números";
	}else{
		// si las variables son números
		if (!ctype_digit($numero1) || !ctype_digit($numero2)) {
			echo("tienen que ser número");
		}else{
			echo $numero1 . " + " . $numero2 . " = " . ($numero1 + $numero2) . "<br>";
			echo $numero1 . " - " . $numero2 . " = " . ($numero1 - $numero2) . "<br>";
			echo $numero1 . " * " . $numero2 . " = " . ($numero1 * $numero2) . "<br>";
			echo $numero1 . " / " . $numero2 . " = " . ($numero1 / $numero2) . "<br>"; 
		}
	} 

 ?>		
