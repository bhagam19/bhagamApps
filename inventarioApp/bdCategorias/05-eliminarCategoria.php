<?php
	include('../conexion/datosConexion.php');

	session_start();
	
	$categoria=$_REQUEST["codCategoria"];	

	$tabla="categoriasDeBienes";
	
	mysqli_query($conexion,"DELETE FROM ".$tabla." WHERE codCategoria=".$categoria);

	mysqli_close($conexion);

?>