<?php 

	$host = "localhost";
	$user = "root";
	$password = "1234";
	$db = "ada";

	$con = mysqli_connect($host,$user,$password,$db);

	if(mysqli_connect_errno()){
		echo("error en la conexión " . mysqli_connect_error());
	} 


 ?>