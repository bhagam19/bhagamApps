<?php
	include('../conexion/datosConexion.php');

	session_start();
	
	$codUbicacion=$_REQUEST["codUbicacion"];	

	$tabla="ubicaciones";
	
	mysqli_query($conexion,"DELETE FROM ".$tabla." WHERE codUbicacion=".$codUbicacion);

	mysqli_close($conexion);

?>