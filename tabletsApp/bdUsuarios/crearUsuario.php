<?php
	session_name("presTablet");
	session_start();

	//Obtener variables.
	$usuario=$_REQUEST['usuario'];
	$contrasena=$_REQUEST['contrasena'];
	$docenteID=$_REQUEST['docente'];
	
	include('../conexion/datosConexion.php');
	$tabla='usuarios';
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla);
	$contador=0;
	while($fila=mysqli_fetch_array($sql)){
		if($fila['usuario']==$usuario){
			$contador++;
		}
	}
	//Crear un nuevo usuario
	// Generamos un salt aleatoreo, de 22 caracteres para Bcrypt
	$salt = substr(base64_encode(openssl_random_pseudo_bytes('30')), 0, 22);
	// A Crypt no le gustan los '+' así que los vamos a reemplazar por puntos.
	$salt = strtr($salt, array('+' => '.')); 
	// Generamos el hash
	$hash = crypt($contrasena, '$2y$10$' . $salt);
	
	if($contador==0){
		$tabla='usuarios';
		$sql=mysqli_query($conexion,"INSERT INTO ".$tabla." (usuario,contrasena,docenteID) VALUES ('$usuario','$hash', $docenteID)");
		echo "si";
		mysqli_close($conexion);
	}else{	
		echo "no";
		mysqli_close($conexion);
	}	
?>
