<?php
	include('../conexion/datosConexion.php');

	session_start();
	
	$mantenimiento=$_REQUEST["codMantenimiento"];	

	$tabla="mantenimiento";
	
	mysqli_query($conexion,"DELETE FROM ".$tabla." WHERE codMantenimiento=".$mantenimiento);

	mysqli_close($conexion);

?>
