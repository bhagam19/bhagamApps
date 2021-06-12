<?php
	session_start();
	include('../conexion/datosConexion.php');
	
	//Obtener variables.
	$id=$_REQUEST['id'];
	$valor=$_REQUEST['valor'];
	$campo=$_REQUEST['campo'];
	
	$tabla='dependencias';
	mysqli_query($conexion,"UPDATE ".$tabla." SET ".$campo."='".$valor."' WHERE codDependencias=".$id);

	if($campo=="usuarioID"){
		mysqli_query($conexion,"UPDATE bienes  SET usuarioID='".$valor."' WHERE codDependencias=".$id);
	}

	mysqli_close($conexion);	
	
?>