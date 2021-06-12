<?php
	include('../conexion/datosConexion.php');

	session_start();
	
	$cod=$_REQUEST["cod"];	

	$tabla="areas";
	
	mysqli_query($conexion,"DELETE FROM ".$tabla." WHERE cod=".$cod);

	mysqli_close($conexion);

?>