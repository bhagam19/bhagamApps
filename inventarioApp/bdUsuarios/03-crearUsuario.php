<?php
	include('../conexion/datosConexion.php');
	
	session_start();

	//Obtener variables.
	$usuario=$_REQUEST['usuario'];
	$contrasena=$_REQUEST['contrasena'];
	$usuarioCED=$_REQUEST['usuarioCED'];
	$apellidos=$_REQUEST['apellidos'];
	$nombres=$_REQUEST['nombres'];
	$defUsuario=$_REQUEST['defUsuario'];
	$permiso=$_REQUEST['permiso'];

	$tabla='usuarios';
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla);
	$contador=0;
	while($fila=mysqli_fetch_array($sql)){
		if($fila['usuario']==$usuario){
			$contador++;
		}
	}
	
	if($contador==0){
		mysqli_query($conexion,"INSERT INTO ".$tabla." (usuario,contrasena,usuarioCED,apellidos,nombres,defUsuario,permiso) 
			VALUES ('$usuario','$contrasena','$usuarioCED','$apellidos','$nombres','$defUsuario','$permiso')");
		echo "si";
	}else{	
		echo "no";
	}
	mysqli_close($conexion);