<?php
	include('../conexion/datosConexion.php');
	$sql=mysqli_query($conexion,'TRUNCATE asignaturas');
   	include('../bdAsignaturas/cargarExcel.php');
   	mysqli_close($conexion);
?>