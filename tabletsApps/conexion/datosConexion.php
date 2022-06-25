<?php
	//####Con este modulo realizamos la conexion al servidor y a la base de datos.
	//####Este modulo da por hecho que ya fue creada la base de datos.
    
    //Estabelecemos la conexion ("host","usuario","contrasena")
	
	@$conexion = mysqli_connect('localhost','dorianrh','D0r14nrh123#','dorianrh_presTablet');
	
	if ($conexion){//Si se conecta, trabajamos en línea.
		 $BD = 'dorianrh_presTablet'; //cargamos la BD en el servidor remoto.
	}else{
		@$conexion = mysqli_connect('localhost','root','');
		$BD = 'presTablet';
		if ($conexion){//Si se conecta, trabajamos en servidor local.

			if(!mysqli_select_db($conexion,$BD)){ //Verificamos si la BD está creada.
				mysqli_query($conexion,"CREATE DATABASE ".$BD);		
			}	
			
		}else{ //Si no se conecta, mostramos el error.
			echo "<br>No se conectó. <br><br>";
			die('Se produjo el error numero'.mysqli_connect_errno().' al intentar realizar la conexión. La causa es: '.mysqli_connect_error());
		}
	}	



?>