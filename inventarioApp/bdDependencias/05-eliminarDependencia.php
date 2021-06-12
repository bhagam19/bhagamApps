<?php
	include('../conexion/datosConexion.php');

	session_start();
	
	$codDependencia=$_REQUEST["codDependencia"];	

	$tabla="dependencias";
	
	mysqli_query($conexion,"DELETE FROM ".$tabla." WHERE codDependencias=".$codDependencia);

	mysqli_close($conexion);

?>