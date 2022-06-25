<?php
	session_name("presTablet");
	session_start();

	$id=$_REQUEST['id'];
	
	include('../conexion/datosConexion.php');

	$tabla='tabletas';
	$consulta=mysqli_query($conexion,"DELETE FROM ".$tabla." WHERE tabletaID=".$id);

	mysqli_close($conexion);

?>
