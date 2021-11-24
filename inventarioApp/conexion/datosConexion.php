<?php
	//####Con este modulo realizamos la conexion al servidor y a la base de datos.
	//####Este modulo da por hecho que ya fue creada la base de datos.    
    //Estabelecemos la conexion ("host","usuario","contrasena")
	include("dtcnx.php"); //
	@$conexion = mysqli_connect($host, $user, $password, $dbname, $port, $socket);	
	if ($conexion){//Si se conecta, trabajamos en línea.
		 $BD = 'Adolfo_inventarioApp'; //cargamos la BD en el servidor remoto.		 
	}else{
		@$conexion = mysqli_connect('localhost','root','');
		$BD = 'inventarioApp';
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