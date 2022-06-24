<?php
	//####Con este modulo realizamos la conexion al servido y a la base de datos.
	//####Este modulo da por hecho que ya fue creada la base de datos.
    
    //Estabelecemos la conexion ("host","usuario","contrasena")
	$conexion = mysqli_connect('localhost','dorianrh','D0r14nrh123#','dorianrh_Biblioteca');
 
	if (!$conexion){
    	die('Se produjo un error al intentar realizar la conexión, numero:'.mysqli_connect_errno().': '.mysqli_connect_error());
	}

	$BD = 'dorianrh_Biblioteca';
?>