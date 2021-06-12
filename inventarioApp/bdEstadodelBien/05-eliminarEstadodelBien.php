<?php
	include('../conexion/datosConexion.php');

	session_start();
	
	$codEstado=$_REQUEST["codEstado"];	

	$tabla="estadoDelBien";
	
	mysqli_query($conexion,"DELETE FROM ".$tabla." WHERE codEstado=".$codEstado);

	mysqli_close($conexion);

?>