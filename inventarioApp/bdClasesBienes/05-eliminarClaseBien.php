<?php
	include('../conexion/datosConexion.php');

	session_start();
	
	$codClase=$_REQUEST["codClase"];	

	$tabla="clasesDeBienes";
	
	mysqli_query($conexion,"DELETE FROM ".$tabla." WHERE codClase=".$codClase);

	mysqli_close($conexion);

?>