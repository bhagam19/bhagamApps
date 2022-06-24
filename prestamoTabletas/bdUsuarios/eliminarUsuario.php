<?php
	session_name("presTablet");
	session_start();

	$usuarioID=$_REQUEST['id'];
	
	include('../conexion/datosConexion.php');

	$tabla='usuarios';
	$consulta=	mysqli_query($conexion,"DELETE FROM ".$tabla." WHERE usuarioID=".$usuarioID);

	mysqli_close($conexion);

?>
