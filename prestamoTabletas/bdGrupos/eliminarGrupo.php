<?php
	session_name("presTablet");
	session_start();

	$id=$_REQUEST['id'];
	
	include('../conexion/datosConexion.php');

	$tabla='grupos';
	$consulta=mysqli_query($conexion,"DELETE FROM ".$tabla." WHERE grupoID=".$id);

	mysqli_close($conexion);

?>
