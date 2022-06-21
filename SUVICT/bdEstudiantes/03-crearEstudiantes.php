<?php
	include('../conexion/datosConexion.php');
	
	session_start();

	//Obtener variables.
	$id=$_REQUEST['id'];
	$apellidos=$_REQUEST['apellidos'];
	$nombres=$_REQUEST['nombres'];
	$usuario=$_REQUEST['usuario'];
	$contrasena=$_REQUEST['contrasena'];
	$permiso=$_REQUEST['permiso'];
	
	$tabla='docentes';
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla);
	$contador=0;
	while($fila=mysqli_fetch_array($sql)){
		if($fila['ID']==$id){
			$contador++;
		}
	}
	
	if($contador==0){
		mysqli_query($conexion,"INSERT INTO ".$tabla." (id, apellidos, nombres, usuario, contrasena, permiso) 
		VALUES ('$id','$apellidos','$nombres',$usuario,'$contrasena',$permiso)");
		echo "si";
	}else{	
		echo "no";
	}
	mysqli_close($conexion);
?>