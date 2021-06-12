<?php
	include('../conexion/datosConexion.php');

	$consulta=mysqli_query($conexion,"SELECT DISTINCT codBien FROM modificacionesBienes ORDER BY codBien ASC");
	$rows=mysqli_num_rows($consulta);

	echo $rows;

?>