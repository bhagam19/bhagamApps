<?php
	session_name("bhagamApps");
	session_start();
	include('../appsConexion/datosConexion.php');		
	//Obtener variables.
	$nombres=$_REQUEST['nombres'];
	$apellidos=$_REQUEST['apellidos'];
	$correo=$_REQUEST['correo'];
	$usuario=$_REQUEST['usuario'];
	$contrasena=$_REQUEST['contrasena'];
	//$usuarioCED=$_REQUEST['usuarioCED']; //Por ahora, no se solicitará este dato, por ser información sensible y privada.
	//$defUsuario=$_REQUEST['defUsuario']; // Por ahora, no se hará uso de este dato
	//$permiso=$_REQUEST['permiso']; // Por ahora, no se hará uso de este dato
	$tabla='usuarios';
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla);
	$cntUsuario=0;
	$cntCorreo=0;
	while($fila=mysqli_fetch_array($sql)){
		if($fila['usuario']==$usuario){
			$cntUsuario++;
		}
		if($fila['correo']==$correo){
			$cntCorreo++;
		}
	}	
	if($cntUsuario==0 && $cntCorreo==0){
		//Encriptamos la contraseña
		$salt = substr(base64_encode(openssl_random_pseudo_bytes('30')), 0, 22);
		$salt = strtr($salt, array('+' => '.')); 
		$contrasenaEncriptada = crypt($contrasena, '$2y$10$' . $salt);	
		mysqli_query($conexion,"INSERT INTO ".$tabla." (usuario,contrasena,usuarioCED,apellidos,nombres,correo,defUsuario,permiso) 
			VALUES ('$usuario','$contrasenaEncriptada',0,'$apellidos','$nombres','$correo',1,1)");
		echo "si";
	}elseif($cntUsuario!=0){	
		echo "NoUsuario";
	}elseif($cntCorreo!=0){	
		echo "NoCorreo";
	}
	mysqli_close($conexion);
?>