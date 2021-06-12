<?php
	include('../conexion/datosConexion.php');

	session_start();
	
	$almacenamiento=$_REQUEST["codAlmacenamiento"];	

	$tabla="almacenamiento";
	
	mysqli_query($conexion,"DELETE FROM ".$tabla." WHERE codAlmacenamiento=".$almacenamiento);

	mysqli_close($conexion);

?>