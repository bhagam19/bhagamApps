<?php
	include('../conexion/datosConexion.php');

	session_start();
	
	$usuarioID=$_REQUEST["usuarioID"];	

	$tabla="usuarios";
	
	mysqli_query($conexion,"DELETE FROM ".$tabla." WHERE usuarioID=".$usuarioID);

	mysqli_close($conexion);

?>